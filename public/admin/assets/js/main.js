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

}
