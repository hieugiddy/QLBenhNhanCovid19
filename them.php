<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm bệnh nhân mới</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="xlthem.php" method="post" enctype="multipart/form-data">
                <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Họ và tên:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" name="hoten" id="typeahead" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Ngày sinh:</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge datepicker" name="ngaysinh" id="date01" value="<?php echo getdate()['mon'].'/'.getdate()['mday'].'/'.getdate()['year']; ?>" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError3">Giới tính:</label>
                <div class="controls">
                    <select id="selectError3" name="gioitinh">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                    </select>
                </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="fileInput">Ảnh chụp</label>
                    <div class="controls">
                    <input class="input-file uniform_on" id="fileInput" accept="image/jpeg,image/png" name="avatar" type="file">
                    </div>
                </div>      
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tuổi:</label>
                    <div class="controls">
                    <input type="number" class="span6 typeahead" name="tuoi" id="typeahead" min="1" value="1" required>
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="typeahead">Địa điểm phát hiện:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" name="diadiem" id="typeahead" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError3">Tình trạng:</label>
                <div class="controls">
                    <select id="selectError3" name="tinhtrang">
                    <option value="1">Nghi ngờ</option>
                    <option value="2">Đang điều trị</option>
                    <option value="3">Đã khỏi bệnh</option>
                    </select>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError1">Quốc tịch</label>
                <div class="controls">
                    <select id="selectError1" multiple data-rel="chosen" name="quoctich[]">
                    <option value="my">Mỹ</option>
                    <option value="vietnam" selected>Việt Nam</option>
                    <option value="hanquoc">Hàn Quốc</option>
                    <option value="nhatban">Nhật Bản</option>
                    <option value="trungquoc">Trung Quốc</option>
                    </select>
                </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Thông tin dịch tễ:</label>
                    <div class="controls">
                    <textarea class="cleditor" id="textarea2" name="dichte" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->