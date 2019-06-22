$(function () {
    $('#example2').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

   //Date picker
   $('#datepicker').datepicker({
    autoclose: true
  })

    //Foto Click
    $("#avatar").click(function(){
      $("#file").click();
    })

    //ketika file input change
    $("#file").change(function(){
        setImage(this,"#avatar");
    })

  })

   // Read Image
   function setImage(input,target) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      // Mengganti src dari object img#avatar
      reader.onload = function(e) {
        $(target).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  // Add Buku
  function add_buku(no_induk,judul){
    var no = $(".buku-item").length+1;
    var content = '<tr class="buku-item '+no_induk+'">';
    content += '<td>'+no+'</td>';
    content += '<td>'+no_induk+'</td>';
    content += '<td>'+judul+'</td>';
    content += '<td>';
    content += '<button type="button" class="btn btn-flat btn-xs btn-danger" no-induk ="'+no_induk+'" onclick="remove_buku(this)">X</button>';
    content += '<input type="hidden" value="'+no_induk+'" name="nobuku[]">';
    content += '<input type="hidden" value="'+judul+'" name="judul[]">';
    content += '</td>';
    content += '</tr>';

    $("#lsBuku").append(content);
  }

  function remove_buku(obj){
    var cls = $(obj).attr("no-induk");
    $("."+cls).remove();
  }

  function pesan(pos,tp,judul,waktu){
    Swal.fire({
      position: pos+'-end',
      type: tp,
      title: judul,
      showConfirmButton: false,
      timer: waktu
    });
  }

  function confimation_hapus(target){

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      size:'850px',
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        window.location = $(target).attr("link");
      } 
    });
  }

  function confimation_simpan(target){
    Swal.fire({
      position: 'center',
      type: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
    window.location = $(target).attr("link");
  }
    
  
  

//BARU
 $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid  : {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#3c8dbc'
      },
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#3c8dbc'
      },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
  })




