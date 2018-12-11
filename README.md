## Deploys

This repo is designed for use with [WP Engine's `git push` deploy mechanism](https://wpengine.com/git/).

```
git remote add wpe-prod git@git.wpengine.com:production/gijn.git
git remote add wpe-staging git@git.wpengine.com:staging/gijn.git
```

This site uses WPE's one-click staging site.

## Setup instructions

Prompt | Text to enter 
------------ | -------------
Name of new site directory: | gijn
Blueprint to use (leave blank for none or use largo): | largo
Domain to use (leave blank for largo-umbrella.dev): | gijn.dev
WordPress version to install (leave blank for latest version or trunk for trunk/nightly version): | *hit [Enter]*
Install as multisite? (y/N): | y
Install as subdomain or subdirectory? : | subdomain
Git repo to clone as wp-content (leave blank to skip): | *hit [Enter]*
Local SQL file to import for database (leave blank to skip): | *This directory must be an absolute path, so the easiest thing to do on a Mac is to drag your mysql file into your terminal window here: the absolute filepath with fill itself in.*
Remove default themes and plugins? (y/N): | y
Add sample content to site (y/N): | N
Enable WP_DEBUG and WP_DEBUG_LOG (y/N): | N

## Creating new sites for conferences:

Each conference site is a site within the multisite network.

1. Gain access to hosting dashboard
2. Run a backup
3. Add desired domain under "Domains" tab
	* It will likely take a few hours for the DNS status to update to green
4. Under the "CDN" tab, ensure that Enable CDN is checked ✅ for your new domain
5. "Network activate" the [MultiSite Clone Duplicator](https://wordpress.org/plugins/multisite-clone-duplicator/) plugin
6. Duplicate the most-recent conference site for that conference series
	* Use largo@inn.org for the admin email address
7. If needed, set up a domain mapping for the subdomain, if the conference uses a domain other than `gijn.org`

