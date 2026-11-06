package com.mitvpro.tv;

import android.content.ContentProvider;
import android.content.ContentValues;
import android.database.Cursor;
import android.database.MatrixCursor;
import android.net.Uri;
import android.os.ParcelFileDescriptor;
import android.provider.OpenableColumns;
import java.io.File;
import java.io.FileNotFoundException;

public class GenericFileProvider extends ContentProvider {
    @Override
    public boolean onCreate() {
        return true;
    }

    @Override
    public ParcelFileDescriptor openFile(Uri uri, String mode) throws FileNotFoundException {
        File file = getFileForUri(uri);
        if (file == null || !file.exists()) {
            throw new FileNotFoundException("File not found for URI: " + uri);
        }
        return ParcelFileDescriptor.open(file, ParcelFileDescriptor.MODE_READ_ONLY);
    }

    private File getFileForUri(Uri uri) {
        String path = uri.getPath();
        if (path == null) return null;
        if (path.startsWith("/")) path = path.substring(1);

        if (getContext() != null) {
            File extDir = getContext().getExternalFilesDir(null);
            if (extDir != null) {
                File f = new File(extDir, path);
                if (f.exists()) return f;
            }

            File cacheDir = getContext().getCacheDir();
            if (cacheDir != null) {
                File f = new File(cacheDir, path);
                if (f.exists()) return f;
            }
        }

        return new File(path);
    }

    @Override
    public Cursor query(Uri uri, String[] projection, String selection, String[] selectionArgs, String sortOrder) {
        File file = getFileForUri(uri);
        MatrixCursor cursor = new MatrixCursor(new String[]{OpenableColumns.DISPLAY_NAME, OpenableColumns.SIZE});
        if (file != null && file.exists()) {
            cursor.addRow(new Object[]{file.getName(), file.length()});
        }
        return cursor;
    }

    @Override
    public String getType(Uri uri) {
        return "application/vnd.android.package-archive";
    }

    @Override
    public Uri insert(Uri uri, ContentValues values) {
        return null;
    }

    @Override
    public int delete(Uri uri, String selection, String[] selectionArgs) {
        return 0;
    }

    @Override
    public int update(Uri uri, ContentValues values, String selection, String[] selectionArgs) {
        return 0;
    }
}
