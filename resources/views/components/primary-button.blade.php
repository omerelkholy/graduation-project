<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2
 bg-green-500 dark:bg-green-500 border
 border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest  dark:hover:bg-green-700
 focus:bg-gray-700 dark:focus:bg-white active:bg-green-900 dark:active:bg-green-300
 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800
 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 
    bg-green-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs
     text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-400 dark:hover:bg-white
      focus:bg-green-400 dark:focus:bg-white active:bg-green-600 dark:active:bg-gray-300 focus:outline-none
       focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800
        transition ease-in-out duration-150']) }} style="background-color: #34d399;">
    {{ $slot }}
</button> --}}
