document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            const targetID = this.getAttribute("href");
            const targetElement = document.querySelector(targetID);

            if (targetElement) {
                const offset = 85; // Sesuaikan offset ini jika perlu
                const elementPosition =
                    targetElement.getBoundingClientRect().top + window.scrollY;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth",
                });
            }
        });
    });

    // });

    // document.addEventListener("DOMContentLoaded", () => {
    const typingElement = document.querySelector(".typing-loop-animation");

    function resetTypingAnimation() {
        typingElement.classList.remove("typing-loop-animation"); // Hapus animasi
        void typingElement.offsetWidth; // Paksa reflow
        typingElement.classList.add("typing-loop-animation"); // Tambahkan lagi animasi
    }

    // Set perulangan animasi dengan jeda 3 detik
    setInterval(resetTypingAnimation, 7000); // 4s (durasi animasi) + 3s (jeda)
    // });

    // document.addEventListener("DOMContentLoaded", function () {
    const readMoreLinks = document.querySelectorAll(".read-more");

    readMoreLinks.forEach((link) => {
        link.addEventListener("click", function () {
            const projectId = this.getAttribute("data-id");
            const shortDescription = document.querySelector(
                `#project-description-${projectId} .short-description`
            );
            const fullDescription = document.querySelector(
                `#project-description-${projectId} .full-description`
            );

            // Toggle visibility
            shortDescription.classList.toggle("hidden");
            fullDescription.classList.toggle("hidden");

            // Ubah teks Read More ke Read Less
            if (fullDescription.classList.contains("hidden")) {
                this.textContent = "Read More";
            } else {
                this.textContent = "Read Less";
            }
        });
    });
    // });

    // document.addEventListener("DOMContentLoaded", function () {
    const experienceContainer = document.getElementById("experience");
    const experiencesContent = document.getElementById("experiences-container");
    const timelineCircle = document.getElementById("timeline-circle");
    const timelineLine = document.querySelector(".timeline-line");

    if (
        !experienceContainer ||
        !timelineCircle ||
        !timelineLine ||
        !experiencesContent
    )
        return;

    // Calculate initial positions and dimensions
    function updateMeasurements() {
        // Get the container's position and dimensions
        const containerRect = experienceContainer.getBoundingClientRect();
        const contentRect = experiencesContent.getBoundingClientRect();

        // Calculate the timeline start and end points
        const timelineStart = timelineLine.offsetTop;
        const timelineEnd = timelineStart + timelineLine.offsetHeight;

        return {
            containerTop: containerRect.top,
            containerHeight: containerRect.height,
            contentTop: contentRect.top,
            contentHeight: contentRect.height,
            timelineStart: timelineStart,
            timelineEnd: timelineEnd,
            timelineLength: timelineEnd - timelineStart,
        };
    }

    // Update circle position based on scroll
    function updateCirclePosition() {
        const measurements = updateMeasurements();
        const viewportHeight = window.innerHeight;
        const viewportMidpoint = viewportHeight / 5;

        // Check if the experience container has reached or passed the middle of the viewport
        if (measurements.containerTop <= viewportMidpoint) {
            // Calculate how far the container has moved past the midpoint
            const pastMidpoint = viewportMidpoint - measurements.containerTop;

            // Calculate the progress through the content (0 to 1)
            let scrollProgress = Math.max(
                0,
                Math.min(1, pastMidpoint / measurements.contentHeight)
            );

            // Calculate the circle's position along the timeline
            const circlePosition =
                measurements.timelineStart +
                measurements.timelineLength * scrollProgress;

            // Update the circle's position
            timelineCircle.style.top = circlePosition + "px";
        } else {
            // If the container hasn't reached the midpoint yet, keep the circle at the start
            timelineCircle.style.top = measurements.timelineStart + "px";
        }

        // If we've scrolled past the content, keep the circle at the end of the timeline
        if (
            measurements.containerTop + measurements.containerHeight <
            viewportMidpoint
        ) {
            timelineCircle.style.top = measurements.timelineEnd + "px";
        }
    }

    // Listen for scroll events
    window.addEventListener("scroll", updateCirclePosition);

    // Initialize the circle position
    updateCirclePosition();

    // Update measurements on resize
    window.addEventListener("resize", function () {
        updateCirclePosition();
    });

    // Buat Observer untuk memantau elemen
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                // Langsung tambahkan kelas in-view saat elemen masuk viewport
                if (entry.isIntersecting) {
                    entry.target.classList.add("in-view");
                }
            });
        },
        {
            // Opsi untuk memicu saat 10% elemen terlihat
            threshold: 0.1,
        }
    );

    // Pilih semua elemen dengan kelas scroll-section
    const scrollSections = document.querySelectorAll(".scroll-section");

    // Amati setiap elemen
    scrollSections.forEach((section) => {
        observer.observe(section);
    });

    // Gunakan Intersection Observer untuk memicu animasi
    const heroObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("hero-visible");
                    // Hentikan observasi setelah animasi dimulai
                    heroObserver.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.1, // Memulai animasi saat 10% elemen terlihat
        }
    );

    // Amati elemen hero
    const heroSection = document.getElementById("hero");
    heroObserver.observe(heroSection);
});
