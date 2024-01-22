window.addEventListener("scroll", function () {
    let currentSection = null;

    document.querySelectorAll(".section__onePage").forEach(function (section) {
        const rect = section.getBoundingClientRect();

        if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
            currentSection = section.id;
        }
    });

    if (currentSection) {
        window.location.hash = "#" + currentSection;
    }
});