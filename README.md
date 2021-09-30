<div id="quesPage_question" style="background-color: white; color: black; padding: 20px">
  <h1><span >Intro</span></h1>
  <p><span>Welcome to the Upshift Technical Challenge.</span></p>
  <p><span>In this technical challenge, you will need to develop a RESTful API for “</span><strong >Gigs</strong><span >” platform.&nbsp;</span></p>
  <p><br></p>
  <h1><span >Requirements</span></h1>
  <ol>
    <li><span >Please use </span><strong >PHP framework Laravel</strong></li>
    <li><span >Please use </span><strong >Relational database </strong><span >(by your choice)</span></li>
    <li><span >Please push your code to a </span><strong >Git</strong><span > repository (more information follows)</span></li>
    <li><span >Please push the Laravel framework alone (without your work) as the first</span><strong > initial commit</strong></li>
    <li><span >Please provide instructions for starting the API</span></li>
  </ol>
  <p><br></p>
  <h2>Repository</h2>
  <p>Please create a <strong>private</strong> repository on <strong>GitLab</strong> named <strong>"[first_name]_[last_name]_upshift_technical_challenge"</strong> (example: <strong>tyler_omaha_technical_channelge</strong>) and allow developer access to the following users:</p>
  <ul>
    <li>Nikola Jordanovski (nick@upshiftwork.com),</li>
    <li>Nikola Kalemdzievski (nikki@upshiftwork.com).</li>
  </ul>
  <p><br></p>
  <h1><span >General Guidance</span></h1>
  <p>Please focus on the following points:</p>
  <ul>
    <li>Clean code,</li>
    <li>Response consistency,</li>
    <li>Database queries efficiency.</li>
  </ul>
  <p><br></p>
  <h1><span >Questions</span></h1>
  <p>Feel free to contact Nikola for any questions at nikki@upshiftwork.com.</p>
  <p><br></p>
  <h1><span >The Gigs API</span></h1>
  <h2><span >Description</span></h2>
  <p><span >This API is for a platform for listing gigs. </span></p>
  <p><span >A </span><strong >gig</strong><span > is a job that lasts a certain period of time, often short-term, like one or several days. </span></p>
  <p><strong >Users</strong><span > should be able to register (create a user) on the API. A user should be able to </span><strong >create</strong><span >, </span><strong >update</strong><span >, </span><strong >list</strong><span >, or </span><strong >delete</strong><span > their companies and </span><strong >create</strong><span >, </span><strong >update</strong><span >, </span><strong >list</strong><span >, or </span><strong >delete</strong><span > gigs. </span></p>
  <p><span >﻿Users should also be able to filter and search gigs by certain parameters.</span></p>
  <p><br></p>
  <h2><span >Authentication</span></h2>
  <p><span >The API should provide authentication for the users. Feel free to choose the authentication type. Evey route of the API must be authenticated, except for the login and register routes. Functionality for confirming email, resetting, and changing passwords is not needed.</span></p>
  <p><br></p>
  <h2><span >Users</span></h2>
  <h3><span >Initial fields (feel free to include other fields if you need):</span></h3>
  <ul>
    <li><strong >Id</strong><span > (Unsigned integer),</span></li>
    <li><strong >Email</strong><span > (String, unique, required),</span></li>
    <li><strong >Password</strong><span > (String, min 6 characters, required),</span></li>
    <li><strong >Name</strong><span > (String, required)</span></li>
    <li><strong >Post rate </strong><span >(Numeric, explained at the end of the document).</span></li>
  </ul>
  <p><br></p>
  <h3><span >Description</span></h3>
  <p><span >Users should be able to update and get their profile info.</span></p>
  <p><br></p>
  <h2><span >Companies</span></h2>
  <h3><span >Initial fields (feel free to include other fields if you need):</span></h3>
  <ul>
    <li><strong >Id</strong><span > (Unsigned integer)</span><strong >,</strong></li>
    <li><strong >Name</strong><span > (String, required).</span></li>
  </ul>
  <p><br></p>
  <h3><span >Description</span></h3>
  <p><span >Each company belongs to a user. Users should be able to CRUD companies.</span></p>
  <p><br></p>
  <h2><span >Gigs</span></h2>
  <h3><span >Initial fields (feel free to include other fields if you need):</span></h3>
  <ul>
    <li><strong >Id</strong><span > (Unsigned integer),</span></li>
    <li><strong >Name</strong><span > (String, required)</span></li>
    <li><strong >Timestamp start</strong><span > (Datetime or Timestamp, required) - When the gig starts,</span></li>
    <li><strong >Timestamp end</strong><span > (Datetime or Timestamp, required) - When the gig ends,</span></li>
    <li><strong >Number of positions</strong><span > (Integer, required),</span></li>
    <li><strong >Pay per hour</strong><span > (Double, required),</span></li>
    <li><strong >Status</strong><span > (Boolean).</span></li>
  </ul>
  <p><br></p>
  <h3><span >Description</span></h3>
  <p><span >Each gig belongs to a company. Users should be able to CRUD gigs. Gigs can be created as a draft or posted.</span></p>
  <p><br></p>
  <h2><span >Additional options</span></h2>
  <p><span >In the response of the company (companies) the following fields should be included:</span></p>
  <ul>
    <li><span >The number of posted gigs,</span></li>
    <li><span >The number of started gigs.</span></li>
  </ul>
  <p><br></p>
  <p><span >Users should be able to filter the gigs by the following parameters:</span></p>
  <ul>
    <li><span >Company,</span></li>
    <li><span >Progress (Not started, Started, Finished),</span></li>
    <li><span >Status (Draft, Posted).</span></li>
  </ul>
  <p><br></p>
  <p><span >Users should be able to search the gigs by:</span></p>
  <ul>
    <li><span >Name.</span></li>
  </ul>
  <p><br></p>
  <h2><span >The “post rate” command</span></h2>
  <p><span >Please create a </span><strong >command</strong><span > (under Console/Commands) that will calculate and update the </span><strong >post rate</strong><span > for each user. The formula for the </span><strong >post rate</strong><span > is the following:</span></p>
  <p><br></p>
  <p><strong >Post rate = (number of posted gigs / number of all shifts) * 100, where:</strong></p>
  <ul>
    <li><strong >number of posted gigs </strong><span >is the number of posted shifts of all the companies that belong to the given user,</span></li>
    <li><strong >number of all shifts</strong><span > is the number of all shifts</span><span > of all the companies that belong to the given user.</span></li>
  </ul>
  <h3><br></h3>
  <p><span >Please assume that there are large quantities (</span><strong >ex. 100K users</strong><span >) of data in both users and gigs tables. Provide a scalable solution or write an explanation on how would you do this if you had more time in the comments.</span></p>
  <p><br></p>
  <p><br></p>
  <div>
    <h1>Comments</h1>
    <div>
      <p>The project can be started as any other cloned Laravel project:</p>
      <p><br></p>
      <ul>
        <li>Clone the repo</li>
        <li>Open a terminal in the folder and run "composer install"</li>
        <li>run "cp .env.example .env" or equivalent based on OS to copy the content of .env.example into .env file</li>
        <li>update the .evn file with the information about the database you are going to use</li>
        <li>run "php artisan key:generate" in the terminal to generate an app key</li>
        <li>run "php artisan migrate" to create the tables in the database</li>
        <li>optional - run "php artisan db:seed" - this command will create 10000 users,1-5 companies for each user and 1-10 gigs for each company, so it will probably take a bit to execute. The amount of seeded data can be changed in database/seeders/UserTableSeeder.php.</li>
      </ul>
      <p><br></p>
      <p>To run the post rate command run "php artisan users:postRate"</p>
      <p><br></p>
      <p>The API uses Laravel Sanctum as authentication. Every time a user logs in or is created, a token is returned which needs to be passed along with the requests for the user to have access to most routes. </p>
      <ul>
        <li>For example, in postman, the token needs to be set up as a Bearer Token in the Auth tab.</li>
      </ul>
      <p><br></p>
      <p>Indexing the database would help when working with large quantities of data. Adding Elasticsearch or something similar. Caching could also be an option, but with time the cached data might become too big for it to be as useful as it used to be. Depending on the amount of data and the frequency of the DB calls, I think both options could be useful and beneficial.</p>
      <p><br></p>
    </div>
  </div>
</div>
