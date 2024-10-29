$(document).ready(function () {
    // Cerrar modal al hacer clic en el botón cerrar
    $(".close").click(function () {
        $(".modal").hide();
    });

    // Cambiar testimonios en el carrusel
    let index = 0;
    const testimonials = $(".testimonial");
    const totalTestimonials = testimonials.length;

    $(".next-btn").click(function () {
        index = (index + 1) % totalTestimonials; // Aumenta el índice y reinicia si supera el total
        updateTestimonial();
    });

    $(".prev-btn").click(function () {
        index = (index - 1 + totalTestimonials) % totalTestimonials; // Disminuye el índice y reinicia si es negativo
        updateTestimonial();
    });

    function updateTestimonial() {
        testimonials.each(function (i) {
            $(this).css("transform", `translateX(-${index * 100}%)`);
        });
    }
});
