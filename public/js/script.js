let url = window.location.href;

let serverUrl = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port;

if (url.indexOf("login") != -1) {

    $("#formForgetPasswordTitle").hide();
    $("#formForgetPassword").hide();

    function checkLogin() {

        let logUsername = document.getElementById("logUsername").value;
        let logPassword = document.getElementById("logPassword").value;

        if (logUsername == "") {
            document.getElementById("logUsernameError").textContent = "Must fill username";
            return false;
        } else {
            document.getElementById("logUsernameError").textContent = "";
        }

        if (logPassword == "") {
            document.getElementById("logPasswordError").textContent = "Must fill password";
            return false;
        } else {
            document.getElementById("logPasswordError").textContent = "";
        }
    }

    if (document.getElementById("forgotpassform")) {
        document.getElementById("forgotpassform").addEventListener("click", forgotPasswordForm)
    }

    function forgotPasswordForm(e) {
        e.preventDefault();

        $("#loginFormTitle").hide();
        $("#loginForm").hide();
        $("#formForgetPasswordTitle").fadeIn();
        $("#formForgetPassword").fadeIn();

    }

}
else if ((url.indexOf("register") != -1)) {

    function checkRegister() {

        let regUsername = document.getElementById("regUsername").value;
        let regEmail = document.getElementById("regEmail").value;
        let regPassword = document.getElementById("regPassword").value;

        let usernameRegex = /^[A-z]{6,}\d*/;
        let passwordRegex = /^[A-z]{6,}\d*/;

        if (regUsername == "") {
            document.getElementById("regUsernameError").textContent = "Username must be filled";
            return false;
        } else {
            document.getElementById("regUsernameError").textContent = "";
        }

        if (!usernameRegex.test(regUsername.trim())) {
            document.getElementById("regUsernameError").textContent = "Username should be atleast 6 characters long";
            return false;
        } else {
            document.getElementById("regUsernameError").textContent = "";
        }

        if (regEmail == "") {
            document.getElementById("regEmailError").textContent = "Email must be filled";
            return false;
        } else {
            document.getElementById("regEmailError").textContent = "";
        }

        if (regPassword == "") {
            document.getElementById("regPasswordError").textContent = "Password must be filled";
            return false;
        } else {
            document.getElementById("regPasswordError").textContent = "";
        }

        if (!passwordRegex.test(regPassword.trim())) {
            document.getElementById("regPasswordError").textContent = "Password should be atleast 6 characters long";
            return false;
        } else {
            document.getElementById("regPasswordError").textContent = "";
        }
    }
}
else if ((url.indexOf("home") != -1)) {

    if (document.getElementById("btnCheckRoom")) {
        document.getElementById("btnCheckRoom").addEventListener("click", checkRoomForm)
    }

    function checkRoomForm(e) {
        e.preventDefault();

        let dateFrom = Date.parse($("#dateFrom").val())
        let dateTo = Date.parse($("#dateTo").val())
        let roomId = $("#roomType").val()
        let idRoomTypeName = $("#roomType").text()

        let currentDate = Date.now()

        if (isNaN(dateFrom)) {
            showToast("You must choose check-in date.", "error");
            return;
        }

        if (isNaN(dateTo)) {
            showToast("You must choose check-out date.", "error");
            return;
        }

        if (dateFrom < currentDate) {
            showToast("You cannot choose check-in date in the past.", "error");
            return;
        }

        if (dateTo < currentDate) {
            showToast("You cannot choose check-out date in the past.", "error");
            return;
        }

        if (dateFrom > dateTo) {
            showToast("Check-in date cannot be after check-out date.", "error");
            return;
        }
        console.log('dateFrom / 1000', dateFrom / 1000)
        console.log('dateTo / 1000', dateTo / 1000)
        console.log('idRoomType', roomId)
        $.ajax({
            url: "/checkRoom",
            method: "GET",
            data: {
                dateFrom: dateFrom / 1000,
                dateTo: dateTo / 1000,
                idRoom: roomId
            },
            success: function (data) {
                if (data == "Ima slobodan termin") {
                    document.getElementById("modalBody").innerHTML = 'You can book this room';
                    document.getElementById("modalButtons").innerHTML = `<a href="/rooms/${roomId}" class="btn btn-primary">Check out your room</a>`;
                    localStorage.removeItem("dateFrom")
                    localStorage.removeItem("dateTo")
                    localStorage.removeItem("idRoomType")
                    localStorage.removeItem("roomName")
                    localStorage.setItem("idRoomType", roomId)
                    localStorage.setItem("roomName", idRoomTypeName)
                    localStorage.setItem("dateFrom", dateFrom / 1000)
                    localStorage.setItem("dateTo", dateTo / 1000)
                } else {
                    document.getElementById("modalBody").innerHTML = 'Sorry, this room is not available at given time ';
                    document.getElementById("modalButtons").innerHTML = `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`;
                }
                $('#myModal').modal('show')
            },
            error: function (xhr, status, msg) {
                console.error(xhr)
                console.error(status)
                console.error(msg)
            }
        })
    }

}
else if ((url.indexOf("completeReservation") != -1)) {
    let dateFrom = localStorage.getItem("dateFrom")
    let dateTo = localStorage.getItem("dateTo")
    let idRoomType = localStorage.getItem("idRoomType")
    let roomName = localStorage.getItem("roomName")
    console.log(idRoomType)
    document.getElementById("crDateFrom").value = new Date(dateFrom * 1000)
    document.getElementById("crDateTo").value = new Date(dateTo * 1000)
    document.getElementById("crRoomType").value = idRoomType
    document.getElementById("crRoomTypeName").value = roomName
    document.getElementById("crDateFromHidden").value = dateFrom
    document.getElementById("crDateToHidden").value = dateTo
    document.getElementById("crRoomTypeHidden").value = idRoomType
    document.getElementById("crRoomTypeNameHidden").value = roomName
}
else if ((url.indexOf("/rooms/") != -1)) {
    let dateFrom = parseInt(localStorage.getItem("dateFrom")) + 1000
    let dateTo = parseInt(localStorage.getItem("dateTo")) + 1000
    let dateF = new Date(dateFrom * 1000); // Convert seconds to milliseconds

    let monthF = dateF.getMonth() + 1; // Month is zero-based, so add 1
    let dayF = dateF.getDate();
    let yearF = dateF.getFullYear();
    let fullDateFrom = `${monthF}/${dayF}/${yearF}`

    let dateT = new Date(dateTo * 1000); // Convert seconds to milliseconds
    let monthT = dateT.getMonth() + 1; // Month is zero-based, so add 1
    let dayT = dateT.getDate();
    let yearT = dateT.getFullYear();
    let fullDateTo = `${monthT}/${dayT}/${yearT}`
    document.getElementById('dateFrom').value = fullDateFrom
    document.getElementById('dateTo').value = fullDateTo
}
else if ((url.indexOf("rooms") != -1)) {
    if (document.getElementById("priceRange")) {
        document.getElementById("priceRange").addEventListener("change", changePrice)
    }
    if (document.getElementById("peopleNumber")) {
        document.getElementById("peopleNumber").addEventListener("change", changePeopleNumber)
    }
    if (document.getElementById("btnFilterRoom")) {
        document.getElementById("btnFilterRoom").addEventListener("click", filterRoom)
    }


    function changePrice() {

        document.getElementById("priceRangeValue").innerHTML = this.value
        console.log(this.value)
    }

    function changePeopleNumber() {

        document.getElementById("peopleNumberValue").innerHTML = this.value
        console.log(this.value)
    }

    function filterRoom() {

        let roomType = parseInt($("#roomCategory").val())
        let peopleNumber = parseInt($("#peopleNumber").val())
        let priceRange = parseInt($("#priceRange").val())

        let numberRegex = /^[0-9]*$/;

        if (numberRegex.test(roomType) && numberRegex.test(peopleNumber) && numberRegex.test(priceRange)) {

            console.log(roomType);
            console.log(peopleNumber);
            console.log(priceRange);


            $.ajax({
                url: "/filterRoom",
                method: "GET",
                data: {
                    roomType: roomType,
                    peopleNumber: peopleNumber,
                    priceRange: priceRange
                },
                success: function (data) {
                    console.table(data)
                    printRooms(data)
                },
                error: function (xhr, status, msg) {
                    console.error(xhr);
                    console.error(status);
                    console.error(msg);

                }
            })
        } else {
            alert("Choose elgible values!")
        }

    }

    function printRooms(data) {

        let html = ''

        for (const d of data) {

            html += `<div class="col-sm col-md-6 col-lg-4">
                        <div class="room">
                            <a href="${serverUrl}/rooms/${d.idRoom}" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/${d.roomPicture});">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="${serverUrl}/rooms/${d.idRoom}">${d.roomName}</a></h3>
                                <p><span class="price mr-2">$${d.roomPrice}.00</span> <span class="per">per night</span></p>
                                <ul class="list">
                                    <li><span>Max:</span> ${d.maxPeoplePerRoom} Persons</li>
                                    <li><span>Size:</span> ${d.roomSize} m2</li>
                                    <li><span>Bed:</span> ${d.numberOfBeds}</li>
                                </ul>
                                <hr>
                                <p class="pt-1"><a href="room-single.html" class="btn-custom">Book Now <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>`
        }

        document.getElementById("printRooms").innerHTML = html
    }


}
else if ((url.indexOf("blog") != -1)) {

    let page = 1
    let keyword = ''

    document.getElementById("blogSearch").addEventListener("keyup", searchBlog)

    function searchBlog() {

        keyword = this.value
        page = 1

        ajax()

        $.ajax({
            url: "searchWord",
            method: "GET",
            data: {
                keyword: keyword
            },
            success: function (data) {
                console.log(data[0].nmberOfBlogs)
                printPaginationButtons(data[0].nmberOfBlogs);
            }
        })

    }

    $(document).on("click", ".paginationLinks", function (e) {
        e.preventDefault()

        page = $(this).attr('href').split("page=")[1]

        ajax()
    })

    function printBlogs(data) {
        let html = ''

        for (const d of data) {
            html += `<div class="col-md-3 d-flex">
                        <div class="blog-entry align-self-stretch">
                            <p class="block-20" style="background-image: url(${d.srcBlog});">
                            </p>
                            <div class="text mt-3 d-block">
                                <h3 class="heading mt-3">${d.textBlog}</h3>
                                <div class="meta mb-3">
                                    <div>${d.blogDate}</div>
                                </div>
                            </div>
                        </div>
                    </div>`
        }

        document.getElementById("blogs").innerHTML = html
    }

    function printPaginationButtons(data) {
        let html = ''
        let broj = Math.ceil(data / 8)

        for (let i = 1; i <= broj; i++) {
            html += `<li><a class="paginationLinks" href="/blog?page=${i}" data-id="${i}">${i}</a></li>`
        }


        document.getElementById("paginationButtons").innerHTML = html
    }

    function ajax() {
        $.ajax({
            url: "/search",
            method: "GET",
            data: {
                page: page,
                keyword: keyword
            },
            success: function (data) {
                printBlogs(data)
                // printPaginationButtons(data.length)
                // console.table(data)
                // console.log(data.length)
            },
            error: function (xhr) {
                console.error(xhr);

            }
        })
    }
}
if (document.getElementById("btnCheckRoom")) {
    document.getElementById("btnCheckRoom").addEventListener("click", checkRoomForm)
}

function checkRoomForm(e) {
    e.preventDefault();

    let dateFrom = Date.parse($("#dateFrom").val())
    let dateTo = Date.parse($("#dateTo").val())
    let roomId = $("#roomId").val()
    let roomName = $("#roomName").val()

    let currentDate = Date.now()

    if (isNaN(dateFrom)) {
        showToast("You must choose check-in date.", "error");
        return;
    }

    if (isNaN(dateTo)) {
        showToast("You must choose check-out date.", "error");
        return;
    }

    if (dateFrom < currentDate) {
        showToast("You cannot choose check-in date in the past.", "error");
        return;
    }

    if (dateTo < currentDate) {
        showToast("You cannot choose check-out date in the past.", "error");
        return;
    }

    if (dateFrom > dateTo) {
        showToast("Check-in date cannot be after check-out date.", "error");
        return;
    }
    console.log('dateFrom / 1000', dateFrom / 1000)
    console.log('dateTo / 1000', dateTo / 1000)
    console.log('idRoomType', roomId)
    $.ajax({
        url: "/checkRoom",
        method: "GET",
        data: {
            dateFrom: dateFrom / 1000,
            dateTo: dateTo / 1000,
            idRoom: roomId
        },
        success: function (data) {
            if (data == "Ima slobodan termin") {
                document.getElementById("modalBody").innerHTML = 'You can book this room';
                document.getElementById("modalButtons").innerHTML = `<a href="/completeReservation" class="btn btn-primary">Complete reservation</a>`;
                localStorage.removeItem("dateFrom")
                localStorage.removeItem("dateTo")
                localStorage.removeItem("idRoomType")
                localStorage.removeItem("roomName")
                localStorage.setItem("idRoomType", roomId)
                localStorage.setItem("roomName", roomName)
                localStorage.setItem("dateFrom", dateFrom / 1000)
                localStorage.setItem("dateTo", dateTo / 1000)
            } else {
                document.getElementById("modalBody").innerHTML = 'Sorry, this room is not available at given time ';
                document.getElementById("modalButtons").innerHTML = `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`;
            }
            $('#myModal').modal('show')
        },
        error: function (xhr, status, msg) {
            console.error(xhr)
            console.error(status)
            console.error(msg)
        }
    })
}

function showToast(message, type) {
    const toastContainer = document.getElementById("toast-container");

    const toast = document.createElement("div");
    toast.classList.add("toast");
    toast.textContent = message;

    if (type === "success") {
        toast.style.backgroundColor = "#28a745";
    } else if (type === "error") {
        toast.style.backgroundColor = "#dc3545";
    } else if (type === "info") {
        toast.style.backgroundColor = "#17a2b8";
    }

    toastContainer.appendChild(toast);

    // Fade in
    setTimeout(() => {
        toast.style.opacity = 1;
    }, 100);

    // Fade out and remove
    setTimeout(() => {
        toast.style.opacity = 0;
        setTimeout(() => {
            toastContainer.removeChild(toast);
        }, 300);
    }, 3000); // Adjust the timeout to control how long the toast is visible
}


