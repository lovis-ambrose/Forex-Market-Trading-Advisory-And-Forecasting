$(document).ready(function(){

  $('#staff_reg').click(function(){
    load_user_data();
   function load_user_data(){
     var action = 'fetch';
     $.ajax({
       url:"inc/staff_reg.php",
       method:"POST",
       data:{action:action},
       success:function(data){
         $('#user_data').html(data);
       }
     });
   }
  });


    load_driver();
    function load_driver(){
      var action = 'drivers';
      $.ajax({
        url:"inc/staff_reg.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#user_data').html(data);
        }
      });
    }


//driver registration
//repair data
  $('#repair').click(function(){
    load_repair_data();
    function load_repair_data(){
      var action = 'fetch';
      $.ajax({
        url:"inc/repair.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#user_data').html(data);
        }
      })
    }
  });

  $('#view_repair').click(function(){
    load_repair_data();
    function load_repair_data(){
      var action = 'load_repair';
      $.ajax({
        url:"inc/repair.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#user_data').html(data);
        }
      })
    }
  });

  //repair data

//Journey data
  $('#journey_data').click(function(){
    load_journey_data();
    function load_journey_data(){
      var action = 'fetch';
      $.ajax({
        url:"inc/journey.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#user_data').html(data);
        }
      })
    }
  });

  $('#journey_report').click(function(){
    load_journey_data();
    function load_journey_data(){
      var action = 'journey_report';
      $.ajax({
        url:"inc/journey.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#user_data').html(data);
        }
      })
    }
  });


  //journey Data

  $('#accident_data').click(function(){
    load_accident_data();
    function load_accident_data(){
      var action = 'fetch';
      $.ajax({
        url:"inc/accident.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#user_data').html(data);
        }
      });
    }
  });
//driver dashboard


//Admin dashboard
//vehicle

//assignment form

  //vehicle_list

  //ALL Users




  //Admin Dashboard

//Officer dashboard
$('#officer_details').click(function(){
  load_officer();
  function load_officer(){
    var action = 'officer';
    $.ajax({
      url:"inc/officer.php",
      method:"POST",
      data:{action:action},
      success:function(data){
        $('#officer_data').html(data);
      }
    });
  }
});

load_officer_data();
function load_officer_data(){
  var action = 'officer1';
  $.ajax({
    url:"inc/officer.php",
    method:"POST",
    data:{action:action},
    success:function(data){
      $('#officer_data').html(data);
    }
  });
}



$('#request').click(function(){
  load_request();
  function load_request(){
    var action = 'request';
    $.ajax({
      url:"inc/request.php",
      method:"POST",
      data:{action:action},
      success:function(data){
        $('#officer_data').html(data);
      }
    });
  }
});
//officer dashboard

//driver Repair
$('#maintenance').click(function(){
  load_maintenance_data();
  function load_maintenance_data(){
    var action = 'maintenance';
    $.ajax({
      url:"maintenance.php",
      method:"POST",
      data:{action:action},
      success:function(data){
        $('#user_data').html(data);
      }
    })
  }
});

//driver dashboard


});
