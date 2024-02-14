// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme settings js logic
 *
 * @module core/modal
 * @copyright  2024 Nursandi <echo.nursandi@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import $ from "jquery";
import Modal from "core/modal";
import { add as addToast } from "core/toast";

export const init = async () => {
    console.log("Hi, this is the first time log with AMD");

    // await new Promise((resolve) => {
    //     setTimeout(() => {
    //         resolve("resolved");
    //     }, 3000);
    // });

    // console.log("waiting in 3 seconds.");
    // console.log('OKE')

    $("img").on("click", function (e) {
        e.preventDefault();
        openModal();
    });

    $("h3, p").on("click", () => {
        addToast("Example string", {
            type: "warning",
            autohide: false,
            closeButton: true,
        });
    });
};

const openModal = async () => {
    /**
     * @type Modal
     */
    const modal = Modal.create({
        title: "Test title",
        body: `<p>Exampe body content</p>`,
        footer: "An example footer content",
        show: true,
        removeOnClose: true,
    });

    return modal;
};
