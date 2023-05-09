var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");

var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};

var promise = axios(Parameter);
//Xử lý khi request thành công
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  districts.length = 1;
  const result = data.filter(n => n.Id === "79");

  for (const k of result[0].Districts) {
    districts.options[districts.options.length] = new Option(k.Name, k.Id);
  }

  //Xử lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
  districts.onchange = function () {
    wards.length = 1;
    const dataCity = data.filter((n) => n.Id === "79");
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
var selectButton = document.getElementById("select_mcp");
// Gửi Ajax request khi người dùng chọn MCP
selectButton.onclick = function() {
  var mcp_id = '0';
  // Lấy thông tin quận huyện và phường xã đã chọn
  const districtName = districts.options[districts.selectedIndex].text;
  const wardName = wards.options[wards.selectedIndex].text;

  $.ajax({
    type: "POST",
    url: "select_mcp.php",
    data: {
      district: districtName,
      ward: wardName
    },
    success: function (response) {
      // Xử lý khi nhận được dữ liệu phản hồi
      // Hiển thị dữ liệu lên trang web
      var jsonData = JSON.parse(response);

      // Tạo bảng và thêm tiêu đề
      var table = $('<table class="table table-bordered table-hover" id="data-table">');
      var headerRow = $('<tr>');
      headerRow.append($('<th class="text-center border p-2">').text('ID'));
      headerRow.append($('<th class="text-center border p-2">').text('Quận'));
      headerRow.append($('<th class="text-center border p-2">').text('Khu vực'));
      headerRow.append($('<th class="text-center border p-2">').text('Quản lí'));
      headerRow.append($('<th class="text-center border p-2">').text('Trạng thái'));
      table.append(headerRow);
      // Lặp qua các phần tử trong đối tượng và thêm các hàng vào bảng
      for (var i = 0; i < jsonData.length; i++) {//that ra chi co 1 mcp tai 1 phuong thoi
          var row = $('<tr>');
          mcp_id = jsonData[i].mcp_id;
          row.append($('<td class="text-center border p-2">').text(jsonData[i].mcp_id));
          row.append($('<td class="text-center border p-2">').text(jsonData[i].mcp_district));
          row.append($('<td class="text-center border p-2">').text(jsonData[i].mcp_address));
          row.append($('<td class="text-center border p-2">').text(jsonData[i].mcp_manager));
          row.append($('<td class="text-center border p-2">').text(jsonData[i].capacity));
          table.append(row);
      }
      //de gui mcp_id cho nut button continue
      var continueButton = document.getElementById("continue");

      continueButton.value = mcp_id;
      
      // Gán bảng cho phần tử HTML
      $('#info_mcp').html(table);
                          },
    error: function () {
      // Xử lý khi có lỗi xảy ra trong quá trình gửi Ajax request
      console.log("Error!");
    }
  });
};

