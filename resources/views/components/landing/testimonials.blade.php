@props(['testimonials'])

<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-title">
            <h2>Kata Mereka</h2>
            <p>Testimoni asli dari para jamaah yang telah mempercayakan perjalanan ibadah mereka bersama kami.</p>
        </div>

        <div class="testimonial-slider">
            @if ($testimonials->count() > 0)
                <div class="testimonial-track" id="testimonialTrack">
                    @foreach ($testimonials as $item)
                        <div class="testimonial-slide">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>

                            <p class="testimonial-text">
                                "{{ $item->content }}"
                            </p>

                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="{{ $item->photo_url }}" alt="{{ $item->name }}">
                                </div>
                                <div class="author-info">
                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($testimonials->count() > 1)
                    <div class="slider-controls">
                        <button class="slider-btn" id="prevBtn" aria-label="Previous Slide">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="slider-btn" id="nextBtn" aria-label="Next Slide">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                @endif
            @else
                <div class="text-center py-10 text-gray-500">
                    <p>Belum ada testimoni saat ini.</p>
                </div>
            @endif
        </div>
    </div>
</section>
