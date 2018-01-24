<title><?=$title?> «Центр переподготовки, повышения квалификации кадров» Павлодар</title>

<!-- Bootstrap core CSS -->
<link href="../../templates/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../../templates/css/style.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="templates/js/script.js"></script>
    <a><input class="btn btn-primary btn-lg" type="button" onclick="this.style='display: none'; print();" value="Распечатать таблицу"/>
        <a href="/admin/rezultat" class="btn btn-primary btn-lg" type="button" value="Назат"/>Назат</a></p>
    <table class="table table-cell-padding">
        <tr>
            <td>ФИО</td>
            <td>Категория</td>
            <td>Всего</td>
            <td>%</td>
            <? for ($i = 0; $i++ < 30;) { ?>
                <td>В-<?= $i ?></td>
            <? } ?>
        </tr>
        <? foreach ($rez as $item):?>
            <?
            $vsego = 0;
            ?>
            <? for ($i = 0; $i++ < 30;) { ?>
                    <?$vsego = $vsego +$item['otv'.$i];?>
                    <?$proc = round($vsego*100/30,0)?>
            <? } ?>
            <tr><td><a href="/admin/people/<?= $item['id'] ?>"><?= $item['fio'] ?></a></td><td><?= Admin::getOneCat($item['cat']) ?></td><td><?=$vsego?></td><td><?=$proc?> %</td>

               <? for ($i = 0; $i++ < 30;) { ?>
               <td>
                   <?= $item['otv'.$i] ?>

               </td>
               <? } ?>

           </tr>
        <? endforeach; ?>
    </table>
