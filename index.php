<button type="button" id = "add_customer" onclick=btn_called(rushit)>click</button>
<script src= "jquery.js"></script>
<script>
    $(function () {
$('#add_customer').click(function () {
        console.log("clicked!!");
        $.ajax({
          type: 'post',
          url: 'add_customer.php',
          dataType: 'json',
          data: {
            "location": "surat",
          },
          success: function (response) {
            console.log(response['sucess']);
          }
        })
      });
    });

    function btn(id){
        consol
    }
      </script>

  

     