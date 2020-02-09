<section class="callback container">
    <?
    $APPLICATION->IncludeFile(
        "/include/" . SITE_ID . "/callback-img.php",
        array(),
        array(
            "MODE" => "html",
        )
    );
    ?>
    <div class="frames__container">
        <div class="inner-container">
            <div class="frame frame_1"></div>
            <div class="frame frame_2"></div>
            <span class="callback__text">
                <?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/callback-title.php",
                    array(),
                    array(
                        "MODE" => "html",
                    )
                );
                ?>
                </span>
            <div class="frame frame_3"></div>
            <div class="frame frame_4"></div>
        </div>
        <div class="callback__button">
            <?
            $APPLICATION->IncludeFile(
                "/include/" . SITE_ID . "/callback.php",
                array(),
                array(
                    "MODE" => "text",
                )
            );
            ?>
        </div>
    </div>
</section>