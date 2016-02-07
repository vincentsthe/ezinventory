(function () {
  'use strict';

  var atkOptionString = "";
  for (var i = 0; i < window.atkList.length; i++) {
    atkOptionString += "<option value='" + window.atkList[i].id + "'>" + window.atkList[i].jenis + "</option>";
  }

  var itemRow = "<tr>" +
    "<td><select class='form-control' name='atk_id[]'>" +
      atkOptionString +
    "</select></td>" +
    "<td><input type='text' name='jumlah_item[]' class='form-control'></td>" +
    "</tr>";

  $("#add-item-button").click(function () {
    $("#pengadaan-table tbody").append($(itemRow));
  });
})();