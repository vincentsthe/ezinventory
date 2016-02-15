(function () {
  'use strict';

  var atkOptionString = "";
  for (var i = 0; i < window.atkList.length; i++) {
    atkOptionString += "<option value='" + window.atkList[i].id + "'>" + window.atkList[i].jenis + "</option>";
  }

  var itemRow = "<tr class='item-row'>" +
    "<td><select class='form-control' name='atk_id[]'>" +
      atkOptionString +
    "</select></td>" +
    "<td><input type='text' name='jumlah_item[]' class='form-control'></td>" +
    "<td><a class='remove-button'><span class='glyphicon glyphicon-remove'></span></a></td>" +
    "</tr>";

  $("#add-item-button").click(function () {
    $("#pemakaian-table tbody").append($(itemRow));

    $(".remove-button").unbind();
    $(".remove-button").click(function () {
      console.log($(this));
      $(this).parents(".item-row").remove();
    });
  });
})();