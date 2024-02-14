"use strict";

module.exports = function (grunt) {
    var path = require("path"),
        PWD = process.env.PWD || process.cwd();

    var decachephp = "../../admin/cli/purge_caches.php";

    var inAMD = path.basename(PWD) == "amd";

    // Globbing pattern for matching all AMD JS source files.
    var amdSrc = [inAMD ? PWD + "/build/*.js" : "**/amd/build/*.js"];

    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        babel: {
            options: {
                sourceMap: true,
                presets: ["@babel/preset-env"],
                plugins: ["@babel/plugin-transform-modules-umd"],
            },
            dist: {
                files: [
                    {
                        expand: true,
                        cwd: "amd/src/",
                        src: ["**/*.js"],
                        dest: "amd/build/",
                        ext: ".min.js",
                    },
                ],
            },
        },
        uglify: {
            amd: {
                files: [
                    {
                        expand: true,
                        src: amdSrc,
                    },
                ],
                options: {
                    report: "min",
                    sourceMap: true,
                },
            },
        },
        watch: {
            options: {
                nospawn: true,
                livereload: true,
            },
            amd: {
                files: ["amd/src/**/*.js"],
                tasks: ["amd", "decache"],
            },
            css: {
                files: ["scss/**/*.scss"],
                tasks: ["decache"],
            },
        },
        exec: {
            decache: {
                cmd: "php " + decachephp,
                callback: function (error) {
                    if (!error) {
                        grunt.log.writeln("Moodle theme cache reseted.");
                    }
                },
            },
        },
    });

    // Load core tasks.
    grunt.loadNpmTasks("grunt-babel");
    grunt.loadNpmTasks("grunt-exec");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-watch");

    // Register tasks.
    grunt.registerTask("amd", ["babel", "uglify"]);
    grunt.registerTask("default", ["watch"]);
    grunt.registerTask("decache", ["exec:decache"]);

    grunt.registerTask("compile", ["babel", "uglify", "decache"]);
};
