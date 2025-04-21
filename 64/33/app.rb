# app.rb
require 'sinatra'
enable :sessions
set :session_secret, "your_secret_key"
def reverse_name(first_name, last_name)
"#{last_name.capitalize} #{first_name.capitalize}"
end
get '/' do
erb :index
end
post '/reverse' do
first_name = params[:first_name].strip
last_name = params[:last_name].strip
if first_name.empty? || last_name.empty?
redirect '/'
else
@reversed_name = reverse_name(first_name, last_name)
erb :reverse
end
end