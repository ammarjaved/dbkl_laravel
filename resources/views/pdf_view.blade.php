<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    
    <!-- pdf.js library -->
{{-- <script src="{{ asset('node_modules/pdfjs-dist/build/pdf.min.js') }}"></script>
<!-- pdf.worker.js -->
<script src="{{ asset('node_modules/pdfjs-dist/build/pdf.worker.min.js') }}"></script> --}}

    
    <style>

</style>
 
</head>
<body>
    {{-- <canvas id="pdfCanvas"> --}}

    <h3 style="text-align: center">Permohonan</h3>
    <div id="my-html" class="container" style="padding: 20px">
    <div class="conatainer-item"><label for="name" >Nombor Rujukan Utiliti</label><input type="text" id="name" value="asdasd"></div>
    <div class="conatainer-item"><label for="test" >Jenis Permohonan
    </label><input type="text" id="test" value="asdasd"></div>
    <div class="grid-item">qweqweqwe</div>
    <div class="grid-item">qweqweqwe</div>
    <div class="grid-item">qweqweqwe</div>
</div>
{{-- </canvas> --}}
<button onclick="generatePDF()">Download PDF</button>
{{-- <button onclick="generatePDF()">Download PDF</button> --}}

</body>
 <script>

function generatePDF() {
    // Use html2canvas to convert the HTML to an image
    html2canvas(document.querySelector('#my-html')).then(function(canvas) {
        // Use jspdf to convert the image to a PDF and download it
        var pdf = new jsPDF();
        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0);
        pdf.save('my-pdf.pdf');
    });
}






    // Fetch the PDF
//         const url = 'https://example.com/my-pdf.pdf';
//     const loadingTask = pdfjsLib.getDocument(url);

//     // Display the PDF
//     loadingTask.promise.then(function(pdf) {
//         // Set up the viewer canvas
//         const canvas = document.createElement('canvas');
//         const context = canvas.getContext('2d');
//         const viewport = pdf.getPage(1).getViewport({ scale: 1 });
//         canvas.height = viewport.height;
//         canvas.width = viewport.width;
//         document.querySelector('#pdf-viewer').appendChild(canvas);

//         // Render the first page
//         pdf.getPage(1).then(function(page) {
//             const renderContext = {
//                 canvasContext: context,
//                 viewport: viewport
//             };
//             page.render(renderContext);
//         });
//     });


</script>
</html>
{{-- <script src="{{ asset('js/pdfjs-dist/build/pdf.js') }}"></script>
<script>
    function generatePDF() {
        var pdfDoc = null;
        var pdfCanvas = document.getElementById('pdfCanvas');
        var pdfCanvasContext = pdfCanvas.getContext('2d');
        var pdfCanvasDims = { width: pdfCanvas.width, height: pdfCanvas.height };
        var pdfOpts = { scale: 1.5, canvas: pdfCanvas, logging: true, };

        pdfjsLib.getDocument({ data: document.documentElement.outerHTML }).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            var totalPages = pdfDoc.numPages;

            // Render the first page
            pdfDoc.getPage(1).then(function(page) {
                var viewport = page.getViewport({ scale: pdfOpts.scale });

                pdfCanvas.width = viewport.width;
                pdfCanvas.height = viewport.height;

                page.render({ canvasContext: pdfCanvasContext, viewport: viewport }).promise.then(function() {
                    pdfCanvas.toBlob(function(blob) {
                        var url = URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'my-pdf.pdf';
                        a.click();
                    });
                });
            });
        });
    }
</script> --}}
