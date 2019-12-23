<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("");
?>


<?/*$APPLICATION->IncludeComponent(
	"bitrix:subscribe.form",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"PAGE" => "#SITE_DIR#personal/subscribe/subscr_edit.php",
		"SHOW_HIDDEN" => "N",
		"USE_PERSONALIZATION" => "Y"
	)
);*/?>

	<form class="pick-up-oil__form">
		<div class="pick-up-oil__select-unfocus">
			<p class="hight-paragraph">Марка автомобиля</p>
		</div>
		<div class="pick-up-oil__select-unfocus">
			<p class="hight-paragraph">Модель автомобиля</p>
		</div>
		<div class="pick-up-oil__select-unfocus">
			<p class="hight-paragraph">Тип двигателя</p>
		</div>
		<div class="pick-up-oil__select_container">
			<div class="pick-up-oil__select-title ">
				<p class="hight-paragraph">Марка автомобиля</p>
			</div>
			<select size="15" class="pick-up-oil__select pick-up-oil__select_car-brand hight-paragraph" name="car-brand"
					id="car-brand" data-placeholder="Марка автомобиля" tabindex="-1" aria-hidden="true">
			</select>
		</div>
		<div class="pick-up-oil__select_container">
			<div class="pick-up-oil__select-title ">
				<p class="hight-paragraph">Модель автомобиля</p>
			</div>
			<select size="15" class="pick-up-oil__select pick-up-oil__select_car-model hight-paragraph" name="car-model"
					id="car-model" data-placeholder="Модель автомобиля" tabindex="0">
				<option class="pick-up-oil__option" value="abc74b93c9fe9214">2107</option>
				<option class="pick-up-oil__option" value="8c4799fa000f2ee7">2108</option>
			</select>
		</div>
		<div class="pick-up-oil__select_container">
			<div class="pick-up-oil__select-title ">
				<p class="hight-paragraph">Тип двигателя</p>
			</div>
			<select size="15" class="pick-up-oil__select pick-up-oil__select_engine-type hight-paragraph" name="engine-type"
					id="engine-type" data-placeholder="Тип двигателя" tabindex="1">
				<option class="pick-up-oil__option" value="abc74b93c9fe9214">Бензиновый двигатель</option>
				<option class="pick-up-oil__option" value="8c4799fa000f2ee7">Дизельный двигатель</option>
			</select>
		</div>
		<button type="submit" class="pick-up-oil__form_button hight-paragraph">Подобрать масло</button>
		<button type="reset" class="pick-up-oil__form_reset hight-paragraph">Сбросить фильтр</button>
	</form>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>