<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student information</title>
    <script src="{{ asset('backend') }}/javascripts/examples/pdf/jquery-2.1.3.js"></script>
    <script src="{{ asset('backend') }}/javascripts/examples/pdf/jspdf.js"></script>
    <script src="{{ asset('backend') }}/javascripts/examples/pdf/pdfFromHTML.js"></script>

    <style>
        body{
            background: #ddd;
        }
        .row{
            width: 650px;
            border-radius: 5px;
            background: #fff;

            margin: 0 auto;
            overflow: hidden;
        }
        .top-section{
            margin-top: 5px;
            overflow: hidden;
            float: none;
            width: auto;

            background: #fff;
            height: 150px;
            margin: 10px 10px;
            display: block;
            border-radius: 5px;
        }
        .logo{
            width: 30%;
            float: left;
            overflow: hidden;
        }
        .logo img{
            width: 100%;
            height: 100%;
        }
        .title{
            width: 70%;
            float: right;
            overflow: hidden;
            background: #2596be;
            height: 100%;
            margin: 0;
            padding: 0;
            border-radius: 5px;
        }
        .title h1{
            margin: 0;
            padding: 0;
            text-align: center;
            text-transform: capitalize;

        }
        .title p{
            margin: 0;
            padding: 0;
            text-align: center;
            text-transform: capitalize;


        }


        .middle-section{
            margin-top: 5px;
            overflow: hidden;
            float: none;
            width: auto;
            padding: 4px;
            background: #fff;

            margin: 10px 10px;
            display: block;
            border-radius: 5px;
            }
            .middle-section h1{
                text-align: center;
                margin: 0 auto;
                padding: 0;
                text-transform: capitalize;
                border-bottom: 2px dashed #000;
                width: 300px;
                margin-bottom: 10px;
            }
            .middle-section .table-box {
                width: 100%;
                background: #ddd;

                border-radius: 5px;
            }
            .middle-section .table-box table{
                border-top:  1px solid #fff;;

                width: 100%;
                padding: 5px;
            }
            .middle-section .table-box table td{
                border-bottom: 1px solid #fff;
                border-left: 1px solid #fff;
                padding: 7px;
                text-transform: capitalize;

            }
            .middle-section .table-box table td:nth-child(4){
                border-right: 1px solid #fff;
            }
            .middle-section .table-box table tr:nth-child(){
               background: #666;
            }

        .bottom-section{
            margin-top: 5px;
            overflow: hidden;
            float: none;
            width: auto;
            padding: 4px;
            background: #666;

            margin: 10px 10px;
            display: block;
            border-radius: 5px;
            }
            .pdf{
                display: block;
                text-align: center;
                text-transform: uppercase;

                text-decoration: none;
                margin-bottom: 10px;

            }
            .pdf:hover{
                color:red
            }
    </style>
</head>
<body>
    <div class="row" id="HTMLtoPDF">
        <div class="top-section">
            <div class="logo">
                <img src="{{ asset("backend/images/1007-08.jpg") }}" alt="">
            </div>
            <div class="title">
                <h1>merasani polytecnic academy</h1>
                <p>education is wealth</p>
                <hr>
            </div>
        </div><hr style="margin: 0 10px;">
        <div class="middle-section">
            <h1>student information</h1>
            <div class="table-box">
                <table>



                    <tr>
                        <td width="20%">Name</td>
                        <td width="30%">{{ $student->user->name }}</td>
                    </tr>
                    <tr>
                        <td width="20%">father's name</td>
                        <td width="30%">{{ $student->user->father_name }}</td>
                    </tr>
                    <tr>
                        <td width="20%">mother's name</td>
                        <td width="30%">{{ $student->user->mother_name }}</td>
                    </tr>
                    <tr>
                        <td width="20%">date of birth</td>
                        <td width="30%">{{ $student->user->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td width="20%">id no</td>
                        <td width="30%">{{ $student->user->id_no }}</td>
                    </tr>
                    <tr>
                        <td width="20%">class</td>
                        <td width="30%">{{ $student->class_name->name }}</td>
                    </tr>
                    <tr>
                        <td width="20%">roll no</td>
                        <td width="30%">{{ $student->roll }}</td>
                    </tr>
                    @if ((@$student->group_name->name))


                    <tr>
                        <td width="20%">group</td>
                        <td width="30%">{{ $student->group_name->name }}</td>
                    </tr>
                    @endif
                    @if ((@$student->shift_name->name))


                    <tr>
                        <td width="20%">shift</td>
                        <td width="30%">{{ $student->shift_name->name }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td width="20%">session</td>
                        <td width="30%">{{ $student->year_name->name }}</td>
                    </tr>
                    <tr>
                        <td width="20%">religion</td>
                        <td width="30%">{{ $student->user->religion }}</td>
                    </tr>
                    <tr>
                        <td width="20%">gender</td>
                        <td width="30%">{{ $student->user->gender }}</td>
                    </tr>
                    <tr>
                        <td width="20%">mobile no</td>
                        <td width="30%">{{ $student->user->mobile }}</td>
                    </tr>




                </table>
            </div>

        </div>

        <div class="bottom-section"></div>

        <a href=""class="pdf"  onclick="HTMLtoPDF()">dawonload pdf</a>


    </div>
    <script>
        $(document).ready(function(){
            function HTMLtoPDF(){
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#HTMLtoPDF')[0];
    specialElementHandlers = {
        '#bypassme': function(element, renderer){
            return true
        }
    }
    margins = {
        top: 50,
        left: 60,
        width: 545
      };
    pdf.fromHTML(
          source // HTML string or DOM elem ref.
          , margins.left // x coord
          , margins.top // y coord
          , {
              'width': margins.width // max width of content on PDF
              , 'elementHandlers': specialElementHandlers
          },
          function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF
            //          this allow the insertion of new lines after html
            pdf.save('html2pdf.pdf');
          }
      )
    }

        });

    </script>


</body>
</html>
