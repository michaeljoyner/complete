(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var AjaxContactForm = function AjaxContactForm(formEl) {
    this.formEl = formEl;
    this.errorBox = null;
};

AjaxContactForm.prototype = {

    init: function init() {
        var reset = document.getElementById('cf-reset');
        reset.addEventListener('click', this.formReset.bind(this), false);
        this.formEl.onsubmit = this.handleSubmit.bind(this);
        this.setupErrorBox();
    },

    sendForm: function sendForm() {
        var fd = new window.FormData(this.formEl);
        var req = new window.XMLHttpRequest();
        var self = this;
        self.clearErrors();
        req.open('POST', this.formEl.getAttribute('action'), true);
        req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        req.onreadystatechange = function (ev) {
            if (req.readyState == 4) {
                if (req.status == 200) {
                    self.showSuccess();
                } else {
                    self.failResponse(req.status);
                }
            }
        };
        req.send(fd);
        return false;
    },

    handleSubmit: function handleSubmit(ev) {
        if (!window.FormData) return true;
        ev.preventDefault();
        this.sendForm();
        return false;
    },

    showSuccess: function showSuccess() {
        this.formEl.className += ' closed';
    },

    failResponse: function failResponse(status) {
        if (status >= 500) {
            this.showErrorMessage('Sorry! There was a problem on our side. Please try again later');
            return;
        }

        if (status === 422) {
            this.showErrorMessage('There was a problem with your input. Please check and try again. All fields are required');
            return;
        }

        this.showErrorMessage('Oops! Something went wrong. Sorry. Please try again.');
    },

    formReset: function formReset() {
        this.formEl.reset();
        this.formEl.className = 'gdb-form';
    },

    setupErrorBox: function setupErrorBox() {
        var box = document.createElement('div');
        box.setAttribute('class', 'cf-error-box');
        this.errorBox = this.formEl.insertBefore(box, this.formEl.firstChild);
    },

    showErrorMessage: function showErrorMessage(message) {
        this.errorBox.innerHTML += "<p>" + message + "</p>";
    },

    clearErrors: function clearErrors() {
        this.errorBox.innerHTML = '';
    }
};

module.exports = AjaxContactForm;

},{}],2:[function(require,module,exports){
'use strict';

window.AjaxContactForm = require('./contactform.js');

},{"./contactform.js":1}]},{},[2]);

//# sourceMappingURL=front.js.map
