

database:
	make -C MySQL/
	make run -C MySQL/
	make createdb -C MySQL/
	make datapopulationscript -C MySQL/

