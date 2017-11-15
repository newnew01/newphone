<html>
<head><title>Test A4 Size</title>
    <link href="/css/barcode-print.css" id="theme" rel="stylesheet">
</head>
<body>

@for($i=0;$i<14;$i++)
    @for($j=0;$j<4;$j++)
        @if($barcode_data['barcode'][($i*4)+($j)] != '')
        <div style="left:{{$pos_x[$j]}}cm;top:{{$pos_y[$i]}}cm;position:absolute" align="right">
            <div class="product_name">{{$barcode_data['product_name'][($i*4)+($j)]}} | <span class="price">{{$barcode_data['price'][($i*4)+($j)]}}.-</span></div>
            <img src="data:image/png;base64,{{$barcode_img[($i*4)+($j)]}}" alt="barcode" class="barcode">
            <div class="barcode-number">{{$barcode_data['barcode'][($i*4)+($j)]}}</div>
        </div>
        @endif
    @endfor

@endfor





</body>
</html>