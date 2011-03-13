# Environment

+ `SeeDB.commands`: Shows the current commands that follow proper syntax formatting which are allowed to be executed in the MySQL Database.
+ `Database.selected`: Show the current database for `USE` operations such as `USE mysql;`.

## `SeeDB.commands`
The `seedb/index`'s `command` textarea contains the actual text then
passes it to the `seedb/interpret` to set the `Session` variable `SeeDB.commands`
w/ contains an array of parsed valid commands. This can be used as a syntax-checker
for MySQL commands.

The `SeeDB.commands` are handled by the `seedb/execute` which then
removes the top of the array upon successful execution.

## `Database.selected`
When set, contains a data model of a `Database`.
This is set by `databases/select` which uses the `Database->select()` method.
The `Session` variable `Database.selected` is removed upon successful
`Database->delete()` via `databases/delete`.