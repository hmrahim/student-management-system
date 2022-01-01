<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student information</title>

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
         h1{
            margin: 0;
            padding: 0;
            text-align: center;
            text-transform: capitalize;


        }
         h4{
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
          <table>
              
          </table>
        </div>
        <div class="middle-section">
            <h4>student information</h4>
            <div class="table-box">
                @php
                $registrationfee= App\model\admin\FeesAmount::where("fee_category_id","1")->where("class_id",$alldata->class_id)->first();
                $originalFee = $registrationfee->fees_amount;
                $discount = $alldata->discount->discount;
                $disountedFee = $originalFee*$discount/100;
                $finalFee = (float)$originalFee-(float)$disountedFee;
                @endphp
                <table>



                    <tr>
                        <td width="20%">Name</td>
                        <td width="30%">{{ $alldata->user->name }}</td>
                    </tr>

                    <tr>
                        <td width="20%">id no</td>
                        <td width="30%">{{ $alldata->user->id_no }}</td>
                    </tr>
                    <tr>
                        <td width="20%">class</td>
                        <td width="30%">{{ $alldata->class_name->name }}</td>
                    </tr>
                    <tr>
                        <td width="20%">roll no</td>
                        <td width="30%">{{ $alldata->roll }}</td>
                    </tr>

                    <tr>
                        <td width="20%">Registration Fee</td>
                        <td width="30%">{{ $originalFee }}tk</td>
                    </tr>
                    <tr>
                        <td width="20%">Discount Fee</td>
                        <td width="30%">{{ $alldata->discount->discount }}%</td>
                    </tr>
                    <tr>
                        <td width="20%">Discounted Amount</td>
                        <td width="30%">{{ $disountedFee }}tk</td>
                    </tr>
                    <tr>
                        <td width="20%">Total Amout</td>
                        <td width="30%">{{ $finalFee }}tk</td>
                    </tr>





                </table>
            </div>

        </div>

        <div class="bottom-section"></div>
    </div>

</body>
</html>
