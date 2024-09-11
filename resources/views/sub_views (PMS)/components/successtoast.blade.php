  @if (session('success'))
      <div id="toast-success"
          class="fixed top-5 right-5 z-50 w-80 max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400"
          role="alert">
          <div class="flex items-center">
              <svg aria-hidden="true" class="w-5 h-5 text-green-500 dark:text-green-400" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3 3 5-5"></path>
              </svg>
              <div class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                  {{ session('success') }}
              </div>
              <button type="button"
                  class="ml-auto -mx-1.5 -my-1.5 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
                  data-dismiss-target="#toast-success" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                      </path>
                  </svg>
              </button>
          </div>

      </div>
      <script>
          // Automatically hide the toast after 5 seconds
          setTimeout(() => {
              const toast = document.getElementById('toast-success');
              if (toast) {
                  toast.classList.add('hidden');
              }
          }, 5000);
      </script>
  @elseif (session('error'))
      <div id="toast-error"
          class="fixed top-5 right-5 z-50 w-80 max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400"
          role="alert">
          <div class="flex items-center">
              <svg aria-hidden="true" class="w-5 h-5 text-red-500 dark:text-red-400" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3 3 5-5"></path>
              </svg>
              <div class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                  {{ session('error') }}
              </div>
              <button type="button"
                  class="ml-auto -mx-1.5 -my-1.5 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
                  data-dismiss-target="#toast-error" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                      </path>
                  </svg>
              </button>
          </div>

      </div>
      <script>
          // Automatically hide the toast after 5 seconds
          setTimeout(() => {
              const toast = document.getElementById('toast-success');
              if (toast) {
                  toast.classList.add('hidden');
              }
          }, 5000);
      </script>
  @endif
