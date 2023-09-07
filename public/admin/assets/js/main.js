window.onload = function () {



    $(document).on("click", ".deleteUser", function (e) {
        e.preventDefault();

        var id = $(this).attr("href").split("/")[5]
        if ($(this).attr("href").split("/")[5] == undefined) {
            var id = $(this).attr("href").split("/")[3]
        }
        $.ajax({

            url: "/admin/users/" + id,
            method: "POST",
            success: function (data) {
                console.table(data)
                printUsers(data)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _method: 'DELETE'
            },
            error: function (xhr, status, msg) {
                console.error(xhr);
                console.error(status);
                console.error(msg);

            }
        })
    })

    $(document).on("click", ".deleteRoom", function (e) {
        e.preventDefault();

        var id = $(this).attr("href").split("/")[5]
        if ($(this).attr("href").split("/")[5] == undefined) {
            var id = $(this).attr("href").split("/")[3]
        }
        $.ajax({

            url: "/admin/rooms/" + id,
            method: "POST",
            success: function (data) {
                console.table(data)
                printRooms(data)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _method: 'DELETE'
            },
            error: function (xhr, status, msg) {
                console.error(xhr);
                console.error(status);
                console.error(msg);

            }
        })
    })

    $(document).on("click", ".deleteReservation", function (e) {
        e.preventDefault();

        var id = $(this).attr("href").split("/")[5]

        if ($(this).attr("href").split("/")[5] == undefined) {
            var id = $(this).attr("href").split("/")[3]
        }

        $.ajax({
            url: "/admin/reservations/" + id,
            method: "DELETE",
            success: function (data) {
                console.table(data)
                printReservations(data)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _method: 'DELETE'
            },
            error: function (xhr, status, msg) {
                console.error(xhr);
                console.error(status);
                console.error(msg);

            }
        })
    })

    function printUsers(data) {

        let html = ''

        for (const d of data) {
            html += `<tr>
            <td>${d.idUser}</td>
            <td>${d.username}</td>
            <td>${d.email}</td>
            <td>${d.password}</td>
            <td>${d.originalPassword}</td>
            <td>${d.active}</td>
            <td>${d.idRole}</td>
            <td><a href="/admin/users/${d.idUser}/edit" class="btn btn-warning">Edit</a></td>
            <td><a href="/admin/users/${d.idUser}" class="btn btn-danger deleteUser">Delete</a></td>
         </tr>`
        }

        document.getElementById("showUsers").innerHTML = html;
    }

    function printRooms(data) {

        let html = ''

        for (const d of data) {
            html += `<tr>
                        <td>${d.idRoom}</td>
                        <td>${d.roomName}</td>
                        <td>${d.roomPicture}</td>
                        <td>${d.idRoomType}</td>
                        <td>$${d.roomPrice}</td>
                        <td>${d.maxPeoplePerRoom}</td>
                        <td>${d.roomSize}</td>
                        <td>${d.numberOfBeds}</td>
                        <td>${d.idRoomStatus}</td>
                        <td><a href="/admin/rooms/${d.idRoom}/edit" class="btn btn-warning">Edit</a></td>
                        <td><a href="/admin/rooms/${d.idRoom}" class="btn btn-danger deleteRoom">Delete</a></td>
                    </tr>`
        }

        document.getElementById("showRooms").innerHTML = html;
    }

    function printReservations(data) {

        let html = ''

        for (const d of data) {
            // Assuming you have a JavaScript object 'u' with a 'dateFrom' property.
            const dateFrom = {
                dateFrom: d.dateFrom, // Replace with your timestamp
            };

            // Create a JavaScript Date object from the timestamp
            const date = new Date(dateFrom.dateFrom * 1000); // Multiply by 1000 to convert to milliseconds

            // Get the components of the date (day, month, year)
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-based, so we add 1
            const year = date.getFullYear();

            // Format the date as 'dd-mm-yyyy'
            const formattedDateFrom = `${day}-${month}-${year}`;

            const dateTo = {
                dateTo: d.dateTo, // Replace with your timestamp
            };

            // Create a JavaScript Date object from the timestamp
            const dTo = new Date(dateTo.dateTo * 1000); // Multiply by 1000 to convert to milliseconds

            // Get the components of the date (day, month, year)
            const dayTo = dTo.getDate().toString().padStart(2, '0');
            const monthTo = (dTo.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-based, so we add 1
            const yearTo = dTo.getFullYear();

            // Format the date as 'dd-mm-yyyy'
            const formattedDateTo = `${dayTo}-${monthTo}-${yearTo}`;
            html += `<tr>
                        <td>${d.idReservedRoom }</td>
                        <td>${formattedDateFrom}</td>
                        <td>${formattedDateTo}</td>
                        <td>${d.roomName }</td>
                        <td><a title="Go to user" href=/admin/users/${d.idUser}/edit">${d.idUser}</a></td>
                        <td>${d.paid === 1 ? 'paid' : 'not paid'}</td>
                        <td><a href="/admin/reservations/${d.idReservedRoom}/edit" class="btn btn-warning">Edit</a></td>
                        <td><a href="/admin/reservations/${d.idReservedRoom}" class="btn btn-danger deleteReservation">Delete</a></td>
                    </tr>`
        }

        document.getElementById("showRooms").innerHTML = html;
    }

}
