<p align="center"><img  src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg"  width="400"></p>



## About the job process in terminal


-  To see all the jobs running
`jobs`
- To start the jobs
`php artisan queue:work`
- To start the jobs in the background
 `php artisan queue:work &`
- To log all the jobs process
`php artisan queue:work > storage/logs/job.log &`
 - To see the jobs also with the id
 `jobs -l`
- To kill the job
`kill (job_id)`


## Start the webapp using browser sync

-  Config your web url in webpack.mix.js
`mix.browserSync('laravel-sandbox.deff')`
- Install all dependencies
`yarn` or `npm install`
- Start browser sync
`yarn run watch` or `npm run watch`
