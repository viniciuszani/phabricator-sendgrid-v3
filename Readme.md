# SendGrid API v3 Extension

This module provides Outbound Mail integration using SendGrid's RESTful API, v3.

# Requirements

- An [[https://sendgrid.com/ | account at SendGrid]]; and
- cURL library for PHP (check using `php -i|grep curl`).

# Installation

Before you start, create your SendGrid API key [[https://app.sendgrid.com/settings/api_keys | in their website]].
Then follow the simple steps below.

# Place the entire directory (sendgrid3) somewhere you wish: `git clone https://github.com/viniciuszani/phabricator-sendgrid-v3.git`;
# Add the new directory to your load-libraries: `./bin/config set load-libraries '["/the/directory/to/phabricator-sendgrid-v3", "CURRENT CONTENT"]'`
# Set your SendGrid key, the one you've created just before step 1 here: `./bin/config set sendgrid3.api-key "YOUR LONG KEY HERE"`
# Set this module as the outbound mail parser (can be done in the admin panel): `./bin/config set metamta.mail-adapter "PhabricatorMailImplementationSendGridV3Adapter"`

Now, the command below should work:

```
echo "Content!" | ./bin/mail send-test --to YOUR_PHABRICATOR_USERNAME --subject Testing
```

# License

[[https://opensource.org/licenses/MIT | The MIT License]]
