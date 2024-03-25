var pages_config = {
    //define an instance of the pagination
    //if any of these properties are not defined, they will default
    //to the global object
    instances: {
        items: {
            // the ID of the container (this should contain a .av-magazine-top-bar item)
            target: ".av-magazine",
            // the individual items you want to paginate
            // should be a class selector
            // but i guess if you wanted, you could do
            // all of any selector
            items: ".av-magazine-entry",
            // iteration count
            iteration: 5
        },
        images: {
            target: "#images",
            items: ".img-tile",
            iteration: 3
        },
        example_of_defaults: {

        }
    },
    //default settings
    global: {
        target: "#default",
        items: ".default-items",
        iteration: 3
    },
    //just the jQuery version number
    version: {
        number: 1,
        jQversion: $().jquery
    }
}

$(function init() {
    var config = pages_config;
    var names = Object.keys(config.instances);
    var version = config.version.number;
    for (var i in names) {
        new Pagemaster(names[i]);
    }
})

var Pagemaster = function (name) {
    var this_instance = pages_config.instances[name];
    this.target = this_instance.target || pages_config.global.target;
    this.items = this_instance.items || pages_config.global.items;
    this.iteration = this_instance.iteration || pages_config.global.iteration;
    this.name = name || "default";
    this.pages = {};
    var OBJ = this;
    //------------- all set up ------------//
    this.init = function () {
        var counter = 0;
        var page_counter = 1;
        $(this.items).each(function () {
            if (counter === OBJ.iteration) {
                page_counter++;
                counter = 0;
            }
            OBJ.pages[page_counter] = OBJ.pages[page_counter] || [];
            OBJ.pages[page_counter].push($(this).get(0));
            counter++;
        })
        var num_pages = Object.keys(this.pages).length;
        var controls = $(this.target).find(".av-magazine-top-bar");
        for (var i = 0; i < num_pages; i++) {
            controls.append("<a href='#" + OBJ.name + (i + 1) + "' data-obj='" + OBJ.name + "'data-num='" + (i + 1) + "'>" + (i + 1) + "</a>");
        }
    }

    this.get_page = function (number) {
        if (number > Object.keys(this.pages).length) {
            return null;
        }
        var current_page = this.pages[number];
        this.current_page = number;
        $(this.items).hide();
        for (var i = 0; i < current_page.length; i++) {
            $(current_page[i]).show();
        }
    }
    this.init();
    this.get_page(1);

    set_events(this);
}

Pagemaster.prototype.nextPage = function () {
    var page_num = this.current_page;
    this.get_page(page_num + 1);
}

var get_page = function (page_obj, number) {
    var current_page = page_obj.pages[number];
    $(page_obj.items).hide();
    for (var i = 0; i < current_page.length; i++) {
        $(current_page[i]).show();
    }
}

var set_events = function (OBJ) {
    $(OBJ.target).find(".av-magazine-top-bar").each(function () {
        $(this).find("a").first().addClass("active");
    })

    $(OBJ.target).find(".av-magazine-top-bar > a").on("click", function () {
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        var page_num = $(this).data("num");
        var this_page = OBJ.pages[page_num];
        $(OBJ.items).hide();
        for (var i in this_page) {
            var item = this_page[i];
            $(item).show();
        }
    })
}