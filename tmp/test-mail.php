<?
if (mail("rogsc2@gmail.com","test subject", "test body","From: from@mail"))
    echo "Сообщение передано функции mail, проверьте почту в ящике.";
else
    echo "Функция mail не работает, свяжитесь с администрацией хостинга.";