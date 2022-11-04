/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// function switchEdit(){
//     var inputs = document.getElementsByClassName("form-control");
//     var edit = document.getElementById("edit");
//     for(i=0; i<inputs.length; i++){
//         inputs[i].disabled = !inputs[i].disabled;
//     }
//     if(edit.innerHTML=="Cancel"){
//         edit.innerHTML="Edit";
//         edit.style.color = "green";
//     }
//     else{
//         edit.innerHTML="Cancel";
//         edit.style.color = "red";
//     }
// }

    $(document).ready( function () {
        $('.dataTable').DataTable();
    } );
    
    $(function(){
        $('#datepicker').datepicker();
      });
      function getXMLHTTPRequest() {
        if (window.XMLHttpRequest) {
            return new XMLHttpRequest();
        } else {
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    
    function callAjax(url, inner) {
        var xmlhttp = getXMLHTTPRequest();
        xmlhttp.open('GET',url, true);
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState==4) && (xmlhttp.status==200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(null);
    }
    
    function showMahasiswa(nama) {
        var inner = 'detailMHS';
        var url = 'get_mahasiswa.php?nama=' + nama;
        if(nama==""){
            document.getElementById(inner).innerHTML='';
        }else{
            callAjax(url,inner);
        }
    }
    
    function showkabupaten(kode) {
        let inner = 'namakab';
        let url = '../lib/get_kab.php?id=' + kode;
        callAjax(url,inner);
    }
    
    function view_data(updateid){
        $('#hiddenuid').val(updateid);
    
        $.ajax({
            url:"editmhs.php",
            type:"post",
            data:{
                updateid:updateid
            },
            success:function(data){
                let mhs = JSON.parse(data);
                let hp = mhs.No_Hp.split(" ").join("");
                $('#upnama').val(mhs.Nama);
                $('#upalamat').val(mhs.Alamat);
                $('#upnohp').val(hp);
                $('#upstat').val(mhs.Status);
                console.log(mhs);
                console.log(hp);
            }
        })
        $('#updatedata').modal("show");
    }
    
    $(function() {
    $("#modalup").validate({
        rules: {
            upnama: "required",
            upalamat: "required",
            upstat: "required",
            upnohp:{
                required: true,    
            }
        },
        messages: {
            upnama: "Masukan inputan nama",
            upnaim: "Masukan inputan nim",
            upastat: "Masukan status mahasiswa",
            upnohp: "Masukan no handphone aktif"
        },
        submitHandler: function(){
            let upnama = $('#upnama').val();
            let upalamat = $('#upalamat').val();
            // let upstat = $('#upstat').attr('selected', 'selected').val();
            // let upstat = $('#upstat').on('change',function(){
                // console.log(('#upstat option:selected').val())
                let upstat = $('#upstat').val();
            let upnohp = $('#upnohp').val(); 
            let upid = $('#hiddenuid').val();
    
            $.ajax({
                url:"editmhs.php",
                type:"post",
                data:{
                    upid:upid,
                    upnama:upnama,
                    upalamat:upalamat,
                    upstat:upstat,
                    upnohp:upnohp
                },
                success:function(data){
                    console.log(data);
                    $('#notif').html('<div class="alert alert-success">'+data+'</div>')
                    // $('#updatedata').modal("hide");
                    $('#updatedata').on("hidden.bs.modal", function(){
                        $(this).find('form').trigger('reset');
                    });
                }
            })
            setInterval(function(){
                    $('#notif').html('');
                    },7000);
        }
    })
    })
    
    // document.querySelector(".inputnumber").addEventListener("keypress", function (evt) {
    //     if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
    //     {
    //         evt.preventDefault();
    //     }
    // });