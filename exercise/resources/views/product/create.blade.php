<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .input-field {
            width: 200px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px auto;
        }

        .add-button {
            padding: 8px 20px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h3>Multiple Product Details Add</h3>
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div id="inputFields">
                <div>
                    <input type="text" name="name[]" placeholder="Product Name" class="input-field">
                </div>
                <div>
                    <input type="text" name="details[]" placeholder="Product Details" class="input-field">
                </div>
                <div>
                    <input type="number" name="price[]" placeholder="Product Price" class="input-field">
                </div>
                <div>
                    <input type="number" name="quantity[]" placeholder="Product Quantity" class="input-field">
                </div>
            </div>
            <button type="button" class="btn btn-success" onclick="addFn()">Add</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function addFn() {
            const divEle = document.getElementById("inputFields");
            
            // Create and append Product Name field
            const iFeild = document.createElement("input");
            iFeild.setAttribute("type", "text");
            iFeild.setAttribute("placeholder", "Product Name");
            iFeild.setAttribute("name", "name[]");
            iFeild.classList.add("input-field");
            divEle.appendChild(iFeild);
            divEle.appendChild(document.createElement("br")); // Add line break

            // Create and append Product Details field
            const iFeild2 = document.createElement("input");
            iFeild2.setAttribute("type", "text");
            iFeild2.setAttribute("placeholder", "Product Details");
            iFeild2.setAttribute("name", "details[]");
            iFeild2.classList.add("input-field");
            divEle.appendChild(iFeild2);
            divEle.appendChild(document.createElement("br")); // Add line break
            
            // Create and append Product Price field
            const iFeild3 = document.createElement("input");
            iFeild3.setAttribute("type", "number");
            iFeild3.setAttribute("placeholder", "Product Price");
            iFeild3.setAttribute("name", "price[]");
            iFeild3.classList.add("input-field");
            divEle.appendChild(iFeild3);
            divEle.appendChild(document.createElement("br")); // Add line break
            
            // Create and append Product Quantity field
            const iFeild4 = document.createElement("input");
            iFeild4.setAttribute("type", "number");
            iFeild4.setAttribute("placeholder", "Product Quantity");
            iFeild4.setAttribute("name", "quantity[]");
            iFeild4.classList.add("input-field");
            divEle.appendChild(iFeild4);
            divEle.appendChild(document.createElement("br")); // Add line break
        }
    </script>
</body>

</html>


