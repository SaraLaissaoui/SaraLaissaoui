<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ingrediants</title>
</head>

<div class="pt-4 w-3/3">
    <label class="block pb-4 text-sm font-bold text-gray-700" for="title">
        Ingrediants
    </label>
    <div class="relative grid grid-cols-2 p-4 border border-green-500 rounded dark:border-green-500">

        @foreach($ingrediants as $ingrediant)
        <div class="relative flex items-center p-4 border border-green-500 rounded dark:border-green-500">
            <input id="bordered-checkbox-1" type="checkbox" value="{{$ingrediant['id']}}" name="ingrediants[]" class="w-4 h-4 ml-4 text-blue-600 bg-gray-100 border-gray-300 rounded  focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-checkbox-1" class="w-20 py-4 pr-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$ingrediant['name']}}</label>
            <input type="number" class="w-32 h-4 ml-4" name="quantity[]">
        </div>

        @endforeach


    </div>
</div>
<script>
    new TomSelect('#select-role', {
        maxItems: 100,
    });
</script>
</body>

</html>