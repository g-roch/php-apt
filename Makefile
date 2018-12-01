

doc: 
	doxygen
docs: doc
	rm -fr $@
	mkdir -p $@
	cp -r doc/html/* $@

.PHONY: doc docs
