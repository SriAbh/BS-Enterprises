gsap.registerPlugin(ScrollTrigger);
gsap.config({
    nullTargetWarn: !1,
    trialWarn: !1
});

function htbgmove() {
    const ht_elm = gsap.utils.toArray('.ht-bg-move-effect');
    if (ht_elm.length == 0) return
    ScrollTrigger.matchMedia({
        "(min-width: 992px)": function() {
            ht_elm.forEach((box, i) => {
                let tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: box,
                        start: "top 80%",
                        end: "+=700px",
                        scrub: 1
                    },
                    defaults: {
                        ease: "none"
                    }
                });
                tl.fromTo(box, {
                    clipPath: 'inset(0% 7% 0% 7%)'
                }, {
                    clipPath: 'inset(0% 0% 0% 0%)',
                    duration: 3
                })
            })
        }
    })
};

ScrollTrigger.matchMedia({
    "(max-width: 1200px)": function() {
        ScrollTrigger.getAll().forEach(t => t.kill())
    }
});

jQuery(window).on('load', function() {
    htbgmove();
    gsap.delayedCall(1, () => ScrollTrigger.getAll().forEach((t) => {
        t.refresh()
    }))
})