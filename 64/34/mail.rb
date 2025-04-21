require 'mail'

# Set up SMTP settings
Mail.defaults do
  delivery_method :smtp, {
    address: 'smtp.gmail.com',
    port: 587,
    user_name: 'aadi.designerwork@gmail.com',
    password: 'jsadwhcjxrsdsrfj', # password removed or expired
    authentication: :login,
    enable_starttls_auto: true
  }
end

# Define email message
message = Mail.new do
  from    'aadi.designerwork@gmail.com'
  to      'aaditya.suryawanshi22@pccoepune.org'
  subject 'Hello from Ruby!'
  body    <<~BODY
    Hi there,

    This is a test email sent from Ruby using the mail gem + Gmail SMTP.

    Cheers,
    AS
  BODY
end

# Send email
message.deliver!





# Steps for   sending email to specific user
# 1.Just click  on user email id
# 2.go to manage your Google account
# 3.just click on security   set 2 step verification
# 4.after that search for app password in search bar.
# 5.for creating app password
#   1.Just click on select app
#   2.Select use other location
#    From drop down box     
#   3.give the name as per ur
#       Requirement.
#   4 .generate password
#   5.copy the generated   
#       Password.
# 6.open the text editor and paste the code  and  paste the app password  as we copied earlier also give sender  and receiver email id as ur wish
# 7.after all of these steps just go to replit online editor
#   1.first we need to login into   
#       Editor.
#   2 .go to create replit and   
#        Select ruby and give title
#        Name as ur wish and
#        Click on  create replit.
# 3.paste the  code  in replit
# 4.just install the PKG like gem install mail.
# 5.run the program through command like ruby main.rb