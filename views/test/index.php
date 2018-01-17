<?php require_once (ROOT."/views/layouts/header.php");?>
    <body onLoad="startTimer();">

<?php require_once (ROOT."/views/layouts/login.php");?>
    <div class="container">

        <div id='vopros' >
        <? if($result):
            $i=0;?>
                <table class="table">
                    <tr><td>Тест начат</td><td><?=$datenach?></td></tr>
                    <tr><td>Осталось времени &nbsp;&nbsp;</td><td>
                            <span id="my_timer" style="font-weight: bold;">00:16:00</span>
                </table>
                <?foreach ($result as $test):
                    $i++;?>

                    <p><b><?=$i?>) <?=$test['vopros']?></b></p>

                    <? foreach ($test['otvet'] as $itemTest):?>
                    <p><input type="radio" id="vop<?=$test['id']?>" name="vop<?=$test['id']?>" value="<?=$itemTest['prav']?>"><?=$itemTest['otvet']?></p>
                    <?endforeach;?>

                <?endforeach;?>
            <input type="button" name="add_otvet" onclick="addotvet();" value="Завершить тестирование">
        </div>
        <?//результаты тестирования?>
        <div id="rezult">
            <table class="table table-striped">
                <tr><td>№</td><td>Ответ</td></tr>
                <form action="end" method="post">
                    <input type="hidden" name="vremproh" id="my_timer2">
                    <input type="hidden" name='cat' id="catend" value='<?=$cat?>'>
                    <input type="hidden" name='name' id="nameend" value='<?=$name?>'>
                    <?for ($x=0; $x++<30;){?>
                        <tr><td>
                                <?=$x?>
                            </td>
                            <td>
                                <div id="otv<?=$x?>"><span style="color:green">Не отвечен!</span></div>
                                <input type="hidden" id="otvrez<?=$x?>" name="otvr<?=$x?>">
                            </td>
                        </tr>
                    <?}?>
                    <tr>

                        <td rows="2">
                            Оставшееся время	<span id="vrem" style="font-weight: bold;"></span>
                            <input type="hidden" id='obshhid' name='obshhid'>
                        </td>
                    </tr>
                    <tr>
                        <td rows=2>
                            Осталось попыток для исправлений - <span id='kolispr'>3</span>
                            <input type="hidden" name='gruupa' id="catend" value='<?=$vgruppa['id']?>'>

                            <input class="btn btn-primary btn-lg" type="button" id="reversotvb" onclick="reversotv()" value='Исправить'>
                            <input class="btn btn-primary btn-lg" type="submit" name="theendtest" value='Отправить результат'>
                            <input type="hidden" id="ispr" value="3"><!--Колличество исправлений-->
                        </td>
                    <tr>
                </form>
            </table>

        </div>

        <?else:?>
        <!-- Example row of columns -->
        <?if (isset($errors) && is_array($errors)):?>
            <?foreach ($errors as $itemErrors):?>
                <?=$itemErrors?><br>
            <?endforeach;?>
        <?endif;?>
        <form method="post" action="">
            <label for="inputEmail">Выберите тип организации </label>
            <select class="form-control" name="cat" id="cat">
                <option></option>

                <? foreach ($cat as $itemCat):?>
                    <option value="<?=$itemCat['id']?>"><?=$itemCat['name']?></option>
                <? endforeach;?>
            </select>
            <label for="inputEmail">Выберите напрвление</label>
            <select class="form-control" name="cat2" id="cat2">
                <option></option>

                <? foreach ($cat as $itemCat):?>
                    <option value="<?=$itemCat['id']?>"><?=$itemCat['name']?></option>
                <? endforeach;?>
            </select>
            <label for="inputEmail">Введите ФИО</label>
            <input type="text" name="name" class="form-control" placeholder="Введите ФИО" value="<?=$name?>">
            <label for="inputEmail">Выберите язык </label>
            <select class="form-control" name="yaz">
                <option></option>
                <option value="kz">Казахский</option>
                <option value="ru">Русский</option>
            </select>
            <input type="submit" name="gotest" class="btn btn-primary btn-lg" value="Далее">
        </form>
            <input type="hidden" name="vremproh" id="my_timer2">
        <?endif;?>

        <?php require_once (ROOT."/views/layouts/footer.php");?>
