<div class="nav-list_container">
    <div class="nav-list__items" data-current-slide="0">
        <div class="nav__item active" data-index="0">
            <span>1</span>
        </div>
        <div class="nav__item" data-index="1">
            <span>2</span>
        </div>
        <div class="nav__item" data-index="2">
            <span>3</span>
        </div>
        <div class="nav__item" data-index="3">
            <span>4</span>
        </div>
        <div class="nav__item" data-index="4">
            <span>5</span>
        </div>
        <div class="nav__item" data-index="5">
            <span>6</span>
        </div>
        <div class="nav__item long-arrow" data-index="6">
            <span>7</span>
        </div>
        <div class="nav__item" style="opacity: 0" data-index="7">
        </div>
    </div>
    <span class="nav-list__arrow"></span>
</div>
<script>
    $('.nav-list__items').slick({
        vertical: true,
        infinite: false,
        swipe: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        dots: false
    });
</script>