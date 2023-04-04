<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="/dist/output.css" rel="stylesheet">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    },
                    screens: {
                        ss: "320px",
                        // => @media (min-width: 640px) { ... }

                        sm: "375px",
                        sl: "425px",

                        md: "768px",
                        // => @media (min-width: 768px) { ... }

                        lg: "1024px",
                        // => @media (min-width: 1024px) { ... }

                        xl: "1280px",
                        // => @media (min-width: 1280px) { ... }

                        desktop: "1440px",
                        // => @media (min-width: 1536px) { ... }
                    },
                },
                container: {
                    padding: {
                        DEFAULT: "1rem",
                        sm: "2rem",
                        lg: "4rem",
                        xl: "5rem",
                        "2xl": "6rem",
                    },
                },
            }
        </script>
        <script>
            function getCat(val) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdb.php",
                    data: 'branch_state=' + val,
                    success: function(data) {
                        console.log(data);
                        $("#branch_city").html(data);

                    }
                });
            }

            function getCat1(val1) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdb1.php",
                    data: 'branch_city=' + val1,
                    success: function(data1) {
                        $("#branch_name").html(data1);
                        console.log("data");
                    }
                });

            }
        </script>


        <script>
            function getDep(val) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "productsub.php",
                    data: 'stateName=' + val,
                    success: function(data) {
                        console.log(data);
                        $("#state_id").html(data);

                    }
                });
            }
        </script>
        <script>
            function getBrncode(val2) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "branchcodesub.php",
                    data: 'branch_name=' + val2,
                    success: function(data2) {
                        console.log(data2);
                        $("#branch_code").html(data2);

                    }
                });
            }
        </script>

        <!-- To Location  Script -->

        <script>
            function getLoc(valdata) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdbc1.php",
                    data: 'tbranch_state=' + valdata,
                    success: function(datab) {
                        console.log(datab);
                        $("#tbranch_city").html(datab);
                        console.log("datab");

                    }
                });
            }


            function getBrncc(valdata1) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdb12.php",
                    data: 'tbranch_city=' + valdata1,
                    success: function(datacc) {
                        $("#tbranch_name").html(datacc);
                        console.log("data12");
                    }
                });

            }

            function getBrnff(valff) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "branchcodesub1.php",
                    data: 'tbranch_name=' + valff,
                    success: function(dataff) {
                        console.log(dataff);
                        $("#tbranch_code").html(dataff);

                    }
                });
            }
        </script>
        <script>
      function getCat3(val) {
        //alert('val');

        $.ajax({
          type: "POST",
          url: "getsubcat.php",
          data: 'catid=' + val,
          success: function(data) {
            $("#subcategory").html(data);

          }
        });
      }
    </script>
    <script>
      function myFunction() {
        document.getElementById("Select").disabled = true;
      }
    </script>
    
    <script>
        function getwar(val2) {
            // alert('val');

            $.ajax({
                type: "POST",
                url: "warcheck.php",
                data: 'Description=' + val2,
                success: function(data2) {
                    console.log(data2);
                    $("#mySelect").html(data2);

                }
            });
        }
    </script>
    <style>
    /* Compiled dark classes from Tailwind */


    /* Custom style */
    .header-right {
        width: calc(100% - 3.5rem);
    }

    .sidebar:hover {
        width: 16rem;
    }

    @media only screen and (min-width: 768px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }
    </style>
</head>