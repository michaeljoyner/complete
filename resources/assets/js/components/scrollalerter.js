var lo = require('lodash');

var ScrollAlerter = function(els) {
    this.listeners = els;
}

ScrollAlerter.prototype.init = function() {
    var self = this;
    window.addEventListener('scroll', lo.throttle(self.fire.bind(this), 100), false);
}

ScrollAlerter.prototype.fire = function(ev) {
    var self = this;
    lo.each(this.listeners, function(el) {
        if(self.isInViewport(el)) {
            el.classList.add('scrolled');
        }
    });
}

ScrollAlerter.prototype.isInViewport = function(el) {
    var rect = el.getBoundingClientRect();

    return (
        rect.top < 100 &&
        rect.top >= 0 &&
        rect.left >= 0
        //rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
        //rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
    );
}

module.exports = ScrollAlerter;