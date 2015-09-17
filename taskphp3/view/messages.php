<div class="container marketing" style="margin-top: 5px">

            <?php
            //вывод всех категории и соответсвующие им подкатегории
            foreach ($get_posts as $array) {

                        echo "<div class='row featurette'>

                            <div class='col-md-2'>
                            <table>
                            <input type='hidden' name='id' value=".$array['id']."/>
                            <input type='hidden' name='author_id' value=".$array['author_id']."/>
                            <th>{$array['username']}</th>
                            <tr><td><img class='featurette-image img-responsive img-thumbnail' src='../img/logo.png' alt=''></td></tr>
                            <tr><td></td></tr>
                            </table>
                            </div>
                            <div class='col-md-7'>
                            <h3 class='featurette-heading'>
                            {$array['create_time']}</h3>

                            <h5 class='featurette-heading'>
                            <a href='' data-toggle='modal' data-target='#editMsg'>Редактировать</a></h5>


                            <h5 class='featurette-heading'>
                            <a href='../controller/deleteMsg.php?id={$array['id']}'>Удалить</a></h5>


                            <p class='lead'>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                            </div>
                            </div><hr class='featurette-divider'>";

            }
            ?>
</div>
<div class="modal fade" id="editMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Отредактировать</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form" role="form" method="get" action="../controller/insertmsg.php" accept-charset="UTF-8" id="login-nav">
                            <div class="form-group">
                                <textarea rows="10" cols="90" id="msg" class="form-control" name="msg">

                                </textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>