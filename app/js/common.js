$(function() {

	// Старт видео при загрузке
	document.getElementById('mov').play();

	// Скролинг по якорям
	$('.anchor').bind("click", function(e){
		var anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top-0 // отступ от меню
		}, 500);
	e.preventDefault();
	});

	// Клик по гамбургеру на моб версии
	$('.mob-menu__link').click(function() {
		$('.mob-menu').toggleClass('show');
	});
	$('.mob-menu .nav-list__item a, .mob-menu__close').click(function() {
		$('.mob-menu').removeClass('show');
	});

	// Отправка формы
	$('form').submit(function() {
		var data = $(this).serialize();
		var goalId = $(this).find('input[ name="goal"]').val();
		data += '&ajax-request=true';
		$.ajax({
			type: 'POST',
			url: 'mail.php',
			dataType: 'json',
			data: data,
			success: (function() {
				$.fancybox.close();
				$.fancybox.open('<div class="thn"><h3>Заявка отправлена!</h3><p>С Вами свяжутся в ближайшее время.</p></div>');
				//gtag('event','submit',{'event_category':'submit','event_action':goalId});
				//fbq('track', 'Lead');
			})()
		});
		return false;
	});

	// Инит фансибокса
	$('.fancybox').fancybox({
		margin: 0,
		padding: 0,
		touch: false
	});

	$('.service-slider-slide__btn').click(function() {
		var title = $(this).parent().find('.service-slider-slide__ttl').html();
		$('#modal input[name=subttl]').val(title);
	});

	$('.cases-slider').slick({
		fade: true
	});

	$('.cases-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$('.cases-slider__img').removeClass('slide'+currentSlide)
		$('.cases-slider__img').addClass('slide'+nextSlide);
	});

	$('.service-slider').slick({
		arrow: true,
		appendArrows: $('.service-arrow'),
		adaptiveHeight: true
	});

	$('.service-item-list li').click(function(){
		var numb = $(this).data('slide');
		$('.service-slider').slick('slickGoTo', numb);
		$(this).addClass('active').siblings().removeClass('active');
	});

	$('.service-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$('.service-item-list li').removeClass('active');
		var curent = $('.service-item-list').find('.slide'+nextSlide);
		curent.addClass('active');
	});

});
