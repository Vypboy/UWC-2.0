const wrapper = document.querySelector(".wrapper"),
selectBtn = wrapper.querySelector(".select-btn"),
searchInp = wrapper.querySelector("input"),
options = wrapper.querySelector(".options");

let countries = ["Quận Thủ Đức", "Quận 1", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7",
                 "Quận 8", "Quận 9","Quận 10", "Quận 11", "Quận 12", "Quận Bình Tân", "Quận Bình Thạnh", "Quận Gò Vấp", "Quận Phú Nhuận",
                 "Quận Tân Bình", "Quận Tân Phú", "Huyện Bình Chánh", "Huyện Cần Giờ", "Huyện Củ Chi", "Huyện Hóc Môn", "Huyện Nhà Bè"];

function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addCountry();

function updateName(selectedLi) {
    searchInp.value = "";
    addCountry(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;
    myFunction();
}

searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
      
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Country not found</p>`;
   
});

function myFunction() {
    // lấy URL của trang hiện tại(trang php)
    var currentUrl = window.location.href;

    // tạo đối tượng URL từ URL hiện tại
    var url = new URL(currentUrl);

    // lấy đối tượng URLSearchParams chứa tất cả các tham số
    var searchParams = new URLSearchParams(url.search);

    // lấy giá trị của tham số 'param1'
    var param1Value = searchParams.get('param1');
    //lay gia tri cua phan duoc chong trong dropdown

    const selectedValue = selectBtn.firstElementChild.innerText;
   // location.href = "route_choosing.php?id= <?php echo searchParams?> & kv = <?php selectedValue ?>";
    location.href = "route_choosing.php?" + searchParams + "&kv=" + selectedValue;
  }

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));