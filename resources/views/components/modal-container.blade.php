<div id="{{$idModal}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed top-0 right-0 bottom-0 left-0 bg-black opacity-50"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-[#256aa5] rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between bg-[#a5f3fc] bg-opacity-70 p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{$title}}
                </h3>
                <button type="button" class="text-gray-800 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$idModal}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:px-8 md:p-5 space-y-4">
                {{ $slot }}
            </div>
            <!-- Modal footer -->
            <div class="gap-4 flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button data-modal-hide="{{$idModal}}" type="button" class="py-2.5 uppercase font-bold px-5 ms-3 text-sm text-black focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">{{$cancel}}</button>
                <button type="submit" class="text-black uppercase font-bold bg-[#a5f3fc] bg-opacity-70 focus:ring-4 focus:outline-none focus:ring-[#a5f3fc] rounded-lg text-sm px-5 py-2.5 text-center {{$hidden == "true" ? "hidden" : ""}}">{{$accept}}</button>
            </div>
        </div>
    </div>
</div>