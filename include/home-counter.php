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
    <style>
        .nav-list_container {
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            z-index: 9;
            left:50px;
            width:50px;
            top: calc(50% - 90px);
            height: 210px;
        }
        .nav-list__arrow {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
        }
        .nav-list__arrow:after {
            content: '';
            display: block;
            position: absolute;
            bottom: 0;
            left: 1px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 6px 4.5px 0 4.5px;
            border-color: #DADADA transparent transparent transparent;
        }
        .nav-list__arrow:before {
            content: '';
            position: absolute;
            display: block;
            top: 0;
            left: 4.5px;
            height: 100%;
            width: 1px;
            background: #DADADA;
        }
        .nav__item.nav__item {
            position: relative;
            display: flex!important;
            justify-content: flex-end;
            width: 35px;
            padding: 10px 0;
            margin-bottom: 35px;
            background: transparent;
        }
        .nav__item span:before {
            content: '';
            position: absolute;
            display: block;
            width:1px;
            height: 30px;
            background: #DADADA;
            left: 4px;
            bottom: -36px;
        }
        .nav__item.long-arrow span:before {
            height: 115px;
            bottom: -115px;

        }
        .nav__item.slick-current:before {
            background: #fff;
        }
        .nav__item span {
            display: inline-block;
            font-family: Days One, Arial, sans-serif;
            font-size: 16px;
            line-height: 22px;
            color: #fff;
        }
        .nav__item:before {
            content: '';
            position: absolute;
            display: block;
            width: 10px;
            height: 10px;
            border: 1px solid #fff;
            transform: rotate(45deg);
            left: 0;
            top: calc(50% - 5px);
        }
    </style>
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