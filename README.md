скачиваем проект с ветки master

$ git clone https://github.com/galexpert/laravel9-vue3-test-menu.git
 <имя_папки>

создаем и подключаем БД на лкальном сервере

в файле локальном .env необходимо установить настройки

APP_KEY=<сгенерировать свой ключ приложения>

APP_URL=<локальный адрес>
 

DB_DATABASE=<локальная база данных>

стартуем работу локального сервера...

далее в консоли выполняем такие действия

устанавливаем все зависимости

npm install

composer install

необходимо выполнить команды:

php artisan key:generate

php artisan storage:link
php artisan migrate
php artisan tinker
Затем, , после получения приглашения, выполняем:
App\Models\Post::factory()->count(50)->create();

npm run build или vite build

чтобы сайт корректно отображался, возможно придется настроить редирект с основного локального домена на папку /public local-domain --> /local-domain/public Это возможно сделать в настройках вашего сервера или в файле .htacces

рабочая тестовая страница должна открываться локальному домену вашего проекта (.env APP_URL=) напр http://localhost

задача выполена с исползованием такого стека
php 8.1
Laravel 9
Vite
Vue 3
Vuex
Vue-router
Bootstrap 5


*************************************ТЗ Описание Задачи************************

Test Task: PHP/Vue Middle Developer

Technologies:
vue 2
vuex
typescript

php 8.1
laravel 8


Job Description:
As a PHP/Vue Junior/Middle Developer, your task is to create a web page with a side menu containing three clickable buttons and a non-clickable logo. Each button will navigate to a different page, and on each page, there will be three tables with different names but potentially containing the same content. Additionally, one of the pages should include pagination functionality.

Expectations:
1.	Use PHP and Vue.js to implement the web page.
2.	Ensure the side menu remains fixed and visible on all pages.
3.	The logo should be non-clickable.
4.	Each button should navigate to a different page without reloading the entire page.
5.	The tables should have different names and may contain the same content.
6.	Implement pagination on one of the pages to display a limited number of table entries per page.
7.	Apply appropriate styling to make the page visually appealing and responsive.
8.	Maintain clean and organized code structure.
9.	Use proper error handling and validation where necessary.
10.	Ensure the final solution is cross-browser compatible and works well on major modern browsers.
Submission Details:
Please provide the following information upon submission of the test task:
1.	A detailed text description of your approach and any assumptions made during development.
2.	A published link where we can view and test the web page.
3.	The total time it took for you to complete the task.
Note: Feel free to use any additional libraries or frameworks as necessary to accomplish the task.
Best of luck with the test task! We look forward to reviewing your submission.


As a PHP/Vue Junior/Middle Developer, your task is to create a web page with a side menu containing three clickable buttons and a non-clickable logo. Each button will navigate to a different page, and on each page, there will be three tables with different names but potentially containing the same content. Additionally, one of the pages should include pagination functionality.

Expectations:
1.	Use PHP and Vue.js to implement the web page.
2.	Ensure the side menu remains fixed and visible on all pages.
3.	The logo should be non-clickable.
4.	Each button should navigate to a different page without reloading the entire page.
5.	The tables should have different names and may contain the same content.
6.	Implement pagination on one of the pages to display a limited number of table entries per page.
7.	Apply appropriate styling to make the page visually appealing and responsive.
8.	Maintain clean and organized code structure.
9.	Use proper error handling and validation where necessary.
10.	Ensure the final solution is cross-browser compatible and works well on major modern browsers.
Submission Details:
Please provide the following information upon submission of the test task:
1.	A detailed text description of your approach and any assumptions made during development.
2.	A published link where we can view and test the web page.
3.	The total time it took for you to complete the task.
Note: Feel free to use any additional libraries or frameworks as necessary to accomplish the task.
Best of luck with the test task! We look forward to reviewing your submission.



